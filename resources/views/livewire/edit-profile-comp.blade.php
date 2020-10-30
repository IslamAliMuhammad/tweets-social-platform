<main>
    <div class="card card-body">
        <h3 class="card-title">Edit profile</h3>

        <form method="POST" action="{{ route('profiles.update', $profile) }}" enctype="multipart/form-data">

            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="inputProfileName">Profile Name</label>
                <input type="text" class="form-control @error('profile_name') is-invalid @enderror" id="inputProfileName" name="profile_name" value="{{ $profile->profile_name }}" required>
                @error('profile_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
          
            <div class="form-group">
                <label for="inputCover">Cover image</label>
                <div class="d-flex flex-row">
                    <input type="file" class="form-control-file @error('cover') is-invalid @enderror" id="inputCover" name="cover" accept="image/*">
                    <label for="inputCover">
                        <img src="{{ asset($profile->cover_path) }}" alt="cover" style="width: 60px">
                    </label>
                </div>
                @error('cover')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="inputAvatar">Avatar</label>
                <div class="d-flex flex-row">
                <input type="file" class="form-control-file @error('avatar') is-invalid @enderror" id="inputAvatar" name="avatar" accept="image/*">
                    <label for="inputAvatar">
                        <img src="{{ asset($profile->avatar_path) }}" alt="avatar" style="width: 40px">
                    </label>
                </div>
                @error('avatar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-info mr-1">Edit</button>

            <a href="{{ route('profiles.show', Auth::user()->user_name) }}" class="btn btn-outline-info">Cancel</a>

          </form>
    </div>
</main>