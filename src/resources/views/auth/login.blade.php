<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <div class="logo_title">
            <h1>FashionablyLate</h1>
        </div>
        <div class="register_button">
            <a href="/register">register</a>
        </div>
    </header>
    <main>
        <div class="login-form__heading">
            <h2>Login</h2>
        </div>
        <div class="login__content">
            <div class="login__content-form">
                <form class="form" action="/login" method="post">
                    @csrf
                    <div class="form__container">
                        <div class="form__group">
                            <div class="form__group-title">
                                <p class="form__label--item">メールアドレス</p>
                            </div>
                            <div class="form__group-content">
                                <div class="form__input--text">
                                    <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}" />
                                </div>
                                <div class="form__error">
                                    @error('email')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form__group">
                            <div class="form__group-title">
                                <p class="form__label--item">パスワード</p>
                            </div>
                            <div class="form__group-content">
                                <div class="form__input--text">
                                    <input type="password" name="password" placeholder="例: coachtech1106" />
                                </div>
                                <div class="form__error">
                                    @error('password')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form__button">
                        <button class="form__button-submit" type="submit">ログイン</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>