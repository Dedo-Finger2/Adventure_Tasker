<div class="d-flex align-items-center justify-content-center" style="height: 100vh;">

    @if (session()->has('error'))
        <div>{{ session('error') }}</div>
    @endif

    <div class="container">
        <div class="row">

            <div class="col-md-6 text-center bg-secondary p-5 rounded-start-4 shadow border border-success border-1">
                <img src="https://www.notion.so/image/https%3A%2F%2Fprod-files-secure.s3.us-west-2.amazonaws.com%2Fb109be17-d1ce-4ce8-ad51-f37d0337eb75%2Fae353813-9441-416a-9373-9ab0c5b97a6c%2Fadventure-tasker8.jpeg?table=block&id=435adc85-479c-4c8a-a75f-6201edd8093a&spaceId=b109be17-d1ce-4ce8-ad51-f37d0337eb75&width=2000&userId=4393523a-545c-4a70-9a7b-79e77d7c6110&cache=v2" class="img-fluid" alt="placeholder">
            </div>

            <div class="col-md-6 d-flex flex-column justify-content-center bg-light p-5 rounded-end-4 shadow border border-success border-1">
                <div class="text-center mt-5">
                    <img src="https://www.notion.so/image/https%3A%2F%2Fprod-files-secure.s3.us-west-2.amazonaws.com%2Fb109be17-d1ce-4ce8-ad51-f37d0337eb75%2Fae353813-9441-416a-9373-9ab0c5b97a6c%2Fadventure-tasker8.jpeg?table=block&id=435adc85-479c-4c8a-a75f-6201edd8093a&spaceId=b109be17-d1ce-4ce8-ad51-f37d0337eb75&width=2000&userId=4393523a-545c-4a70-9a7b-79e77d7c6110&cache=v2" class="img-fluid w-25 mx-auto" alt="logo">
                    <h1 class="text-center mt-5">Login</h1>
                    <hr>
                </div>
                <form class="w-50 mx-auto mb-5">

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email:</label>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      @error('email') <span class="text-danger fw-bold">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Senha:</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                      @error('password') <span class="text-danger fw-bold">{{ $message }}</span> @enderror
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
