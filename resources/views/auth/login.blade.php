<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <title>GARAGISTE</title>
    <style>
      span{
        color:red;
      }

      .register-link p a{
        color: black;
        text-decoration: none;
        font-weight: 600;
      }
      .register-link p a:hover{
        text-decoration: underline;
      }
    </style>
</head>
<body>
  <div class="py-14">
    <div class="flex bg-white rounded-lg shadow-lg overflow-hidden mx-auto max-w-sm lg:max-w-4xl">
        <div class="hidden lg:block mt-20 lg:w-1/2 bg-cover"
            style="background: url('{{asset("dist/img/loginback3.jpg")}}') no-repeat;">
        </div>
        <div class="w-full p-8 lg:w-1/2">
            <h2 class="text-2xl font-semibold text-gray-700 text-center">LOGIN PAGE</h2>
          <form method="POST" action="{{route('login.post')}}">
            @csrf
            <div class="mt-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">EMAIL ADDRESS :</label>
                <input class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none" type="email" name='email' id="email"/>
                @if ($errors->has('email'))
                  <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
              </div>
            <div class="mt-4">
                <div class="flex justify-between">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">PASSWORD</label>
                </div>
                <input class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none" type="password" name="password" id="password"/>
                @if ($errors->has('password'))
                  <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
              </div>
            <div class="mt-8">
                <button type="submit" class="bg-gray-700 text-white font-bold py-2 px-4 w-full rounded hover:bg-gray-600">LOGIN</button>
            </div>
            <div class="register-link mt-4 ">
              <p class="flex justify-center">don't have an account? <a href="{{route('register')}}">register</a></p>
            </div>
          </form>
        </div>
    </div>
  </div>

</body>
</html>
