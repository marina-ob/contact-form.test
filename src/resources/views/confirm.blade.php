@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection


@section('content')
<div class="confirm__heading">
    <h2>Confirm</h2>
</div>
<div class="confirm__content">
    <form class="form" action="/contacts" method="post">
    @csrf
        <div class="confirm-table">
            <table class="confirm-table__inner">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__text">
                        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}" readonly />
                        <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}" readonly />
                        <div class="confirm-table__text__content">
                            {{ $contact['last_name'] }}　
                            {{ $contact['first_name'] }}
                        </div>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__text">
                        <input type="hidden" name="gender" value="{{ $contact['gender'] }}" readonly />
                        <div class="confirm-table__text__content">
                            <?php if ($contact['gender'] == '1') {
                                echo '男性';
                            } elseif ($contact['gender'] == '2') {
                                echo '女性';
                            } else {
                                echo 'その他';
                            } ?>
                        </div>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__text">
                        <input type="email" name="email" value="{{ $contact['email'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__text">
                        <input type="tel" name="tel" value="{{ $tel }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__text">
                        <input type="text" name="address" value="{{ $contact['address'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__text">
                        <input type="text" name="building" value="{{ $contact['building'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__text">
                        <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}" readonly />
                        <div class="confirm-table__text__content">
                            <?php if ($contact['category_id'] == '1') {
                                echo '商品のお届けについて';
                            } elseif(['category_id'] == '2') {
                                echo '商品の交換について';
                            }elseif(['category_id'] == '3') {
                                echo '商品トラブル';
                            }elseif(['category_id'] == '4') {
                                echo 'ショップへのお問い合わせ';
                            } else {
                                echo 'その他';
                            } ?>
                        </div>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせ内容</th>
                    <td class="confirm-table__text">
                        <input type="text" name="detail" value="{{ $contact['detail'] }}" readonly />
                    </td>
                </tr>
            </table>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">送信</button>
            <a class="edit" href="/">修正</a>
        </div>
    </form>
</div>
@endsection