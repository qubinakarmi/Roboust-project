@extends('admin.layouts.app2')

@section('title', 'Add Office')

@section('content')
    <main class="app-main">
        <div class="app-content">
            <div class="container-fluid">

                <div class="card card-info card-outline">

                    <div class="card-header">
                        <h3 class="card-title">Add New Office</h3>
                    </div>

                    <form action="{{ route('offices.store') }}" method="POST">
                        @csrf

                        <div class="card-body">
                            <div class="row g-3">

                                {{-- Office Name --}}
                                <div class="col-md-12">
                                    <label class="form-label">Office Name</label>
                                    <input type="text" name="name"
                                        class="form-control" value="{{ old('name') }}"
                                        required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Email --}}
                                <div class="col-md-12">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email"
                                        class="form-control"
                                        value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Address --}}
                                <div class="col-md-12">
                                    <label class="form-label">Address</label>
                                    <textarea name="address" rows="4" class="form-control" required>{{ old('address') }}</textarea>
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Phone 1 --}}
                                <div class="col-md-12">
                                    <label class="form-label">Phone 1</label>
                                    <input type="text" name="phone_1"
                                        class="form-control"
                                        value="{{ old('phone_1') }}">
                                    @error('phone_1')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Phone 2 --}}
                                <div class="col-md-12">
                                    <label class="form-label">Phone 2</label>
                                    <input type="text" name="phone_2"
                                        class="form-control"
                                        value="{{ old('phone_2') }}">
                                    @error('phone_2')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Phone 3 --}}
                                <div class="col-md-12">
                                    <label class="form-label">Phone 3</label>
                                    <input type="text" name="phone_3"
                                        class="form-control "
                                        value="{{ old('phone_3') }}">
                                    @error('phone_3')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="col-md-12">
                                    <label class="form-label">Map Link</label>
                                    <textarea name="map_link" rows="4" class="form-control" required>{{ old('map_link') }}</textarea>
                                    @error('map_link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Head Office --}}
                                <div class="col-md-12">
                                    <label class="form-label">Head Office</label>
                                    <select name="is_head_office"
                                        class="form-select">
                                        <option value="0" {{ old('is_head_office') == '0' ? 'selected' : '' }}>
                                            No
                                        </option>
                                        <option value="1" {{ old('is_head_office') == '1' ? 'selected' : '' }}>
                                            Yes
                                        </option>
                                    </select>
                                    @error('is_head_office')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Status --}}
                                <div class="col-md-12">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select @error('status') is-invalid @enderror">
                                        <option value="1" {{ old('status', 1) == '1' ? 'selected' : '' }}>
                                            Active
                                        </option>
                                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>
                                            Inactive
                                        </option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Save Office
                            </button>

                            <a href="{{ route('offices.index') }}" class="btn btn-secondary">
                                Cancel
                            </a>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </main>
@endsection
