<div class="glass col-12 embed-responsive" dir="rtl">

    <form class="form col-12"  action="{{route('Information.form')}}" method="post">
        @csrf
        <h1 class="title">
              اطلاعات خریدار
        </h1>
        <div class="input-group col-12">


            <input class="string outline my-auto py-4 form-control" type="text" placeholder="نام و نام خانوادگی :" name="name">
            <hr style="color: #ffffff">
            <input class="string outline mt-4 pt-4 form-control" type="email" placeholder="ایمیل :" name="email">
            <hr style="color: #FFFFFF">
            <textarea class="string outline form-control" type="text" placeholder="آدرس :" name="address"></textarea>
            <hr style="color: #FFFFFF">

            <input class="string outline form-control" type="text" placeholder="کد پستی :" name="postal_code">
            <hr style="color: #FFFFFF">
            <input class="string outline form-control" type="text" placeholder="شماره تلفن ثابت :" name="number_1">
            <hr style="color: #FFFFFF">
            <input class="string outline form-control" type="text" placeholder="شماره تلفن همراه :" name="number_2">
            <hr style="color: #FFFFFF">
        </div>

        <input class="button outline form-control" type="submit" value="ثبت اطلاعات">
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
