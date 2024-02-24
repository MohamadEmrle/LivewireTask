<div>
    <form wire:submit.prevent="loginUser">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email </label>
            <input
            type="text"
            class="form-control"
            id="email"
            name="email"
            wire:model='email'
            placeholder="Enter your email "
            autofocus
            />
        </div>
        @error('email') <span class="error">{{ $message }}</span> @enderror
        <div class="mb-3 form-password-toggle">
            <div class="d-flex justify-content-between">
            <label class="form-label" for="password">Password</label>

            </div>
            <div class="input-group input-group-merge">
            <input
                type="password"
                id="password"
                class="form-control"
                name="password"
                wire:model='password'
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="password"
            />
            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
            @error('password') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
        </div>
        </form>
</div>
