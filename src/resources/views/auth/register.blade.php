<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <div class="logo_title">
            <h1>FashionablyLate</h1>
        </div>
        <div class="login_button">
            <a href="/login">login</a>
        </div>
    </header>
    <main>
        <div class="register-form__heading">
            <h2>Register</h2>
        </div>
        <div class="register__content">
            <div class="register__content-form">
                <form class="form" action="/register" method="post">
                    @csrf
                    <div class="form__container">
                        <div class="form__group">
                            <div class="form__group-title">
                                <p class="form__label--item">お名前</p>
                            </div>
                            <div class="form__group-content">
                                <div class="form__input--text">
                                    <input type="text" name="name" placeholder="例:山田 太郎" value="{{ old('name') }}" />
                                </div>
                                <div class="form__error">
                                    @error('name')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
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
                        <button class="form__button-submit" type="submit">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>