<div class="d-flex align-items-center justify-content-center bg-dark-subtle" style="height: 100vh;">

    <div class="container">
        <div class="row">

            <div class="col-md-7 text-center">
                @if (session()->has('error'))
                    <div>{{ session('error') }}</div>
                @endif
                <img src="https://github.com/Dedo-Finger2/Adventure_Tasker/blob/beta-02-styled/adventure-tasker8.jpeg?raw=true" class="img-fluid rounded-start-4 shadow border border-success border-1" alt="placeholder">
            </div>

            <div class="col-md-5 d-flex flex-column justify-content-center bg-light rounded-end-4 shadow border border-success border-1">
                <div class="text-center mt-5">
                    <img src="https://github.com/Dedo-Finger2/Adventure_Tasker/blob/beta-02-styled/adventure-tasker8.jpeg?raw=true" class="img-fluid w-25 rounded-5 mx-auto" alt="logo">
                    <h1 class="text-center mt-2">Login</h1>
                    <hr>
                </div>
                <form wire:submit.prevent="auth" class="w-50 mx-auto mb-5">

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email:</label>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" wire:model="email">
                      @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Senha:</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword1" wire:model="password">
                      @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <a href="{{ route('user.create') }}">Não possuo conta</a>
                    </div>

                    <button type="submit" class="btn btn-outline-success shadow-sm w-100">Log-in</button>
                  </form>
            </div>

        </div>
    </div>

</div>
