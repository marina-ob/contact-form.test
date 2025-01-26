@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection


@section('content')
<div class="contact-form__heading">
    <h2>Contact</h2>
</div>
<div class="contact-form__content">
    <form class="form" action="/contacts/confirm" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text-name">
                    <input type="text" name="last_name" placeholder="例：山田" value="{{ old('last_name') }}">
                    <input class="form__input--text-name_f" type="text" name="first_name" placeholder="例：太郎" value="{{ old('first_name') }}">
                </div>
                <div class="form__error">
                    @error('last_name')
                    {{ $message }}
                    @enderror
                    @error('first_name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--radio">
                    <label>
                        <input class="visibility-hidden" type="radio" name="gender" value="1" {{ old ('gender') == '1' ? 'checked' : '' }} checked><span class="radio-text">男性</span>
                    </label>
                    <label>
                        <input class="visibility-hidden" type="radio" name="gender" value="2" {{ old ('gender') == '2' ? 'checked' : '' }}><span class="radio-text">女性</span>
                    </label>
                    <label>
                        <input class="visibility-hidden" type="radio" name="gender" value="3" {{ old ('gender') == '3' ? 'checked' : '' }}><span class="radio-text">その他</span>
                    </label>
                </div>
                <div class="form__error">
                    @error('gender')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="email" name='email' placeholder="例:test@example.com" value="{{ old('email') }}">
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
                <span class="form__label--item">電話番号</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text-tel">
                    <input type="tel" name="tel1" pattern="[0-9]{1,5}" placeholder="080" value="{{ old('tel1') }}">
                    <span class="form__label--item">・</span>
                    <input type="tel" name="tel2" pattern="[0-9]{1,5}" placeholder="1234" value="{{ old('tel2') }}">
                    <span class="form__label--item">・</span>
                    <input type="tel" name="tel3" pattern="[0-9]{1,5}" placeholder="5678" value="{{ old('tel3') }}">
                </div>
                <div class="form__error">
                    @error('tel1')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
                </div>
                <div class="form__error">
                    @error('address')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="building" placeholder="例:千駄ヶ谷マンション101" value="{{ old('building') }}">
                </div>
                <div class="form__error">
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせの種類</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text__category">
                    <select name="category_id">
                        <option class="category-form" value="">選択してください</option>
                        <option value="1" @if( old('category_id') === '1' ) selected @endif>商品のお届けについて</option>
                        <option value="2" @if( old('category_id') === '2' ) selected @endif>商品の交換について</option>
                        <option value="3" @if( old('category_id') === '3' ) selected @endif>商品トラブル</option>
                        <option value="4" @if( old('category_id') === '4' ) selected @endif>ショップへのお問い合わせ</option>
                        <option value="5" @if( old('category_id') === '5' ) selected @endif>その他</option>
                    </select>
                </div>
                <div class="form__error">
                    @error('category_id')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせ内容</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--textarea">
                    <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                </div>
                <div class="form__error">
                    @error('detail')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection