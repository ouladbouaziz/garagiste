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
            <h2 class="text-2xl font-semibold text-gray-700 text-center">INSCRIPTION PAGE</h2>
            <p class="text-xl text-gray-600 text-center">Welcome!</p>
          <form method="POST" action="{{route('register.post')}}">
            @csrf
            <div class="mt-4">
              <label for="name" class="block text-gray-700 text-sm font-bold mb-2">FULL NAME :</label> 
              <input type="text" name="name" id="name" class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none" />
              @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
              @endif
            </div>

            <div class="mt-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">EMAIL ADDRESS</label>
                <input class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none" type="email" name='email' id="email"/>
                @if ($errors->has('email'))
                  <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="mt-4">
                <label for="adresse" class="block text-gray-700 text-sm font-bold mb-2">ADRESSE</label>
                <input class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none" type="text" name='adresse' id="adresse"/>
                @if ($errors->has('adresse'))
                  <span class="text-danger">{{ $errors->first('adresse') }}</span>
                @endif
            </div>
            <div class="mt-4">
                <label for="telephone" class="block text-gray-700 text-sm font-bold mb-2">TELEPHONE</label>
                <input class="bg-gray-200 text-gray-700 focus:outline-none focus:shadow-outline border border-gray-300 rounded py-2 px-4 block w-full appearance-none" type="text" name='telephone' id="telephone"/>
                @if ($errors->has('telephone'))
                  <span class="text-danger">{{ $errors->first('telephone') }}</span>
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
                <button type="submit" class="bg-gray-700 text-white font-bold py-2 px-4 w-full rounded hover:bg-gray-600">REGISTER</button>
            </div>
            <div class="register-link mt-4 ">
              <p class="flex justify-center">already registered? <a href="{{route('login')}}">login</a></p>
            </div>
          </form>
        </div>
    </div>
  </div>

</body>
</html>
