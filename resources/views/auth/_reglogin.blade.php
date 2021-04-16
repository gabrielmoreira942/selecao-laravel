<form method="POST" action="{{ route('register') }}">
    @csrf



         <a
             <x-button class="ml-4" href="{{route('register')}}">
            {{ __('Cadastre-se') }}
             </x-button>
         </a>

</form>
