<div class="glass col-12 embed-responsive" dir="rtl">

    <form class="form col-12"  action="{{route('offer.form')}}" method="post">
        @csrf
        <h1 class="title">
            انتقادات و پیشنهادات
        </h1>
        <div class="input-group col-12">
            <input class="string outline my-auto py-4" type="text" placeholder="نام کاربری :" name="name">
            <hr style="color: #ffffff">
            <hr style="color: #FFFFFF">
            <input class="string outline mt-4 pt-4" type="email" placeholder="ایمیل :" name="email">
            <hr style="color: #FFFFFF">
            <hr style="color: #FFFFFF">
            <input class="string outline" type="text" placeholder="موضوع :" name="subject">
            <hr style="color: #FFFFFF">
            <hr style="color: #FFFFFF">
            <textarea class="button outline" type="text"  rows="5" name="message" placeholder=توضیحات></textarea>
            <hr style="color: #FFFFFF">
            <hr style="color: #FFFFFF">
        </div>

        <input class="button outline" type="submit" value="ارسال">
    </form>
</div>
<style>
    body {
        background-attachment: fixed;
        background-size: cover;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
        font-family: Helvetica, Arial, sans-serif;
    }

    .glass {
        background: inherit;
        position: absolute;
        overflow: hidden;
        box-shadow: 0 0 15px -5px #000;
    }

    .glass::before {
        content: '';
        background: inherit;
        position: absolute;
        top: -5px; left: -5px; right: -5px; bottom: -5px;
        filter: blur(5px);
    }

    .form {
        position: relative;
        display: flex;
        flex-direction: column;
        padding: 32px;
    }

    .title {
        margin: 0 0 32px;
        color: #090808;
        text-shadow: 0 0 5px #000;
    }

    .outline {
        outline: none;
        border: 1px solid #ccc;
        transition: border .3s;
    }

    .outline:focus {
        border: 2px solid #08f;
    }

    .string {
        display: block;
        padding: 8px;
        width: 100%;
        box-sizing: border-box;
        font-size: 24px;
    }

    .input-group > *:first-child {
        border-radius: 8px 8px 0 0;
    }
    .input-group > *:last-child {
        border-radius: 0 0 8px 8px;
    }

    .button {
        margin-top: 32px;
        width: 100%;
        font-size: 24px;
        border-radius: 8px;
        padding: 8px;
        cursor: pointer;
    }

    .button:hover {
        border: 2px solid #08f;
    }
</style>
