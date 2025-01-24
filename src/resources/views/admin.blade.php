<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/paginate.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <div class="logo_title">
            <h1>FashionablyLate</h1>
        </div>
        <div class="logout_button">
            <form class="form" action="/logout" method="post">
                @csrf
                <button class="logout__button-btn">logout</button>
            </form>
        </div>
    </header>
    <main>
        <div class="login-form__heading">
            <h2>Admin</h2>
        </div>


<div class="admin-container">
    <div class="buttons">
        <div class="export-btn">
            <button class="export">エクスポート</button>
        </div>
        <div class="paginate">
            {{ $contacts->links('pagination::default') }}
        </div>
    </div>
    <div class="contacts">
        <table class="contacts__table">
            <tr class="table-heading">
                <th class="column">お名前</th>
                <th class="column">性別</th>
                <th class="column">メールアドレス</th>
                <th class="column" colspan="2">お問い合わせ種類</th>
            </tr>
            @foreach($contacts as $contact)
            <tr class="table-inner">
                <td class="name">
                    {{ $contact['last_name'] }}
                    <span class="space"></span>
                    <span class="first">{{ $contact['first_name'] }}</span>
                </td>
                <td class="gender">
                    <input type="hidden" value="{{ $contact['gender'] }}" />
                    <?php
                    if ($contact['gender'] == '1') {
                        echo '男性';
                    } elseif ($contact['gender'] == '2') {
                        echo '女性';
                    } else {
                        echo 'その他';
                    }
                    ?>
                </td>
                <td class="email">
                    {{ $contact['email']}}
                </td>
                <td class="category">
                    
                </td>
                <td class="detail-button">
                    
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

    </main>
</body>
</html>