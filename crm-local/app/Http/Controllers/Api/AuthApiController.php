<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthApiController extends Controller
{   
    // API login
    public function login(Request $request)
    {
        $credentials = $request->only('login', 'password');
        $login = mb_strtolower($credentials['login']);
        $user = User::whereRaw('LOWER(login) = ?', [$login])->first();


        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return response()->json(['error' => 'Ошибка авторизации (Неверный логин или пароль)'], 401);
        }

        // Генерируем токен вручную:
        $token = auth('api')->login($user);

        return $this->respondWithToken($token);

    }

    // Получить текущего пользователя
    public function me()
    {
        return response()->json(auth('api')->user());
    }

    // Выход
    public function logout()
    {
        auth('api')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    // ==================
    // CRUD пользователей
    // ==================

    // Список всех пользователей
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    // Просмотр одного пользователя
    public function show($id)
    {
        $user = User::find($id);
        if (!$user) return response()->json(['message' => 'User not found'], 404);
        return response()->json($user);
    }

    // Создать пользователя (сотрудника)
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role'  => 'required|string', // если используешь роли
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $password = Str::random(10); // случайный пароль

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'login'    => $request->login,
            'role'     => $request->role, // если есть поле role
            'password' => Hash::make($password),
        ]);

        // Отправить письмо с паролем
        Mail::raw(
            "Вас добавили в CRM. Ваш пароль: $password\nРекомендуем сменить пароль после входа.",
            function ($message) use ($user) {
                $message->to($user->email)
                        ->subject('Доступ к CRM');
            }
        );

        return response()->json(['message' => 'User created', 'user' => $user], 201);
    }

    // Обновить пользователя
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) return response()->json(['message' => 'User not found'], 404);

        $validator = Validator::make($request->all(), [
            'name'  => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255|unique:users,email,' . $user->id,
            'role'  => 'sometimes|string',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user->update($validator->validated());
        return response()->json(['message' => 'User updated', 'user' => $user]);
    }

    // Удалить пользователя
    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) return response()->json(['message' => 'User not found'], 404);
        $user->delete();
        return response()->json(['message' => 'User deleted']);
    }

    // ==================
    // Сброс пароля по e-mail
    // ==================
    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $status = Password::sendResetLink($request->only('email'));
        if ($status === Password::RESET_LINK_SENT) {
            return response()->json(['message' => 'Password reset link sent']);
        }
        return response()->json(['message' => 'Unable to send reset link'], 400);
    }

    // === ГЛАВНОЕ ИЗМЕНЕНИЕ ===
    protected function respondWithToken($token)
    {
        $user = auth('api')->user(); // Получаем текущего пользователя
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth('api')->factory()->getTTL() * 60,
            'user'         => $user,         // возвращаем пользователя (в нём есть role)
            'role'         => $user->role,   // и отдельно роль (для удобства на фронте)
        ]);
    }
}
