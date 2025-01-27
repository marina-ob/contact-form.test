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
        <div class="admin-form__heading">
            <h2>Admin</h2>
        </div>
        <div class="admin-container">
            <form class="search-form" action="/contacts/search" method="get">
                @csrf
                <div class="search-form__item">
                    <input class="search-form__item-input" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" >
                    <div class="search-form__item-gender">
                        <select name="gender">
                            <option value="">性別</option>
                            <option value="">全て</option>
                            <option value="1">男性</option>
                            <option value="2">女性</option>
                            <option value="3">その他</option>
                        </select>
                    </div>
                    <div class="search-form__item-category">
                        <select name="category_id">
                            <option value="">お問い合わせの種類</option>
                            <option value="1">商品のお届けについて</option>
                            <option value="2">商品の交換について</option>
                            <option value="3">商品トラブル</option>
                            <option value="4">ショップへのお問い合わせ</option>
                            <option value="5">その他</option>
                        </select>
                    </div>
                    <div class="search-form__item-date">
                        <input name="date" type="date" />
                    </div>
                    <div class="search-form__button">
                        <button class="search-form__button-submit" type="submit">検索</button>
                    </div>
                    <div class="reset-form__button">
                        <button class="reset-form__button-submit" type="reset" value="reset">リセット</button>
                    </div>
                </div>
            </form>
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
                        <th class="column-name">お名前</th>
                        <th class="column">性別</th>
                        <th class="column-email">メールアドレス</th>
                        <th class="column">お問い合わせ種類</th>
                        <th class="column"></th>
                    </tr>
                    @foreach($contacts as $contact)
                    <tr class="table-inner">
                        <td class="name">
                            <span class="last">{{ $contact['last_name'] }}</span>
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
                            {{ $contact['category']['content'] }}
                        </td>
                        <td class="detail-button">
                            <button class="detail" id="openModal">詳細</button>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="modal-wrapper" id="myModal">
            <div class="modal-window">
                <span id="closeModal">×</span>
                <table class="modal__content">
                    <tr class="modal-inner">
                        <th class="modal-ttl">お名前</th>
                        <td class="modal-data">
                            {{ $contact['last_name'] }}<span class="space"></span><span class="firstName">{{ $contact['first_name'] }}</span>
                        </td>
                    </tr>
                    <tr class="modal-inner">
                        <th class="modal-ttl">性別</th>
                        <td class="modal-data">
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
                    </tr>
                    <tr class="modal-inner">
                        <th class="modal-ttl">メールアドレス</th>
                        <td class="modal-data">{{ $contact['email'] }}</td>
                    </tr>
                    <tr class="modal-inner">
                        <th class="modal-ttl">電話番号</th>
                        <td class="modal-data">{{ $contact['tel'] }}</td>
                    </tr>
                    <tr class="modal-inner">
                        <th class="modal-ttl">住所</th>
                        <td class="modal-data">{{ $contact['address'] }}</td>
                    </tr>
                    <tr class="modal-inner">
                        <th class="modal-ttl">建物名</th>
                        <td class="modal-data">{{ $contact['building'] }}</td>
                    </tr>
                    <tr class="modal-inner">
                        <th class="modal-ttl">お問い合わせの種類</th>
                        <td class="modal-data">{{ $contact['category']['content'] }}</td>
                    </tr>
                    <tr class="modal-inner">
                        <th class="modal-ttl">お問い合わせ内容</th>
                        <td class="modal-data">{{ $contact['detail']}}</td>
                    </tr>
                </table>
                <form class="delete-form" action="/delete" method="post">
                    @method('delete')
                    @csrf
                    <input type="hidden" name="id" value="{{ $contact['id'] }}" />
                    <button class="delete-btn">削除</button>
                </form>
            </div>
        </div>
    </main>
<script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>