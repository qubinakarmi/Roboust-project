@extends('admin.layouts.app2')

@section('title', 'Edit Office')

@section('content')
    <main class="app-main">
        <div class="app-content">
            <div class="container-fluid">

                <div class="card card-info card-outline">

                    <div class="card-header">
                        <h3 class="card-title">Edit Office</h3>
                    </div>

                    <form action="{{ route('offices.update', $office->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <div class="row g-3">

                                {{-- Office Name --}}
                                <div class="col-md-12">
                                    <label class="form-label">Office Name</label>
                                    <input type="text" name="name"
                                        class="form-control "
                                        value="{{ old('name', $office->name) }}" required>

                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Email --}}
                                <div class="col-md-12">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email"
                                        class="form-control"
                                        value="{{ old('email', $office->email) }}" required>

                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Address --}}
                                <div class="col-md-12">
                                    <label class="form-label">Address</label>
                                    <textarea name="address" rows="4" class="form-control" required>{{ old('address', $office->address) }}</textarea>

                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Phone 1 --}}
                                <div class="col-md-12">
                                    <label class="form-label">Phone 1</label>
                                    <input type="text" name="phone_1" class="form-control"
                                        value="{{ old('phone_1', $office->phone_1) }}">
                                </div>

                                {{-- Phone 2 --}}
                                <div class="col-md-12">
                                    <label class="form-label">Phone 2</label>
                                    <input type="text" name="phone_2" class="form-control"
                                        value="{{ old('phone_2', $office->phone_2) }}">
                                </div>

                                {{-- Phone 3 --}}
                                <div class="col-md-12">
                                    <label class="form-label">Phone 3</label>
                                    <input type="text" name="phone_3" class="form-control"
                                        value="{{ old('phone_3', $office->phone_3) }}">
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Map Link</label>
                                    <textarea name="map_link" rows="4" class="form-control" required>{{ old('map_link', $office->map_link) }}</textarea>

                                    @error('map_link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Head Office --}}
                                <div class="col-md-12">
                                    <label class="form-label">Head Office</label>
                                    <select name="is_head_office" class="form-select">
                                        <option value="0"
                                            {{ old('is_head_office', $office->is_head_office) == 0 ? 'selected' : '' }}>
                                            No
                                        </option>
                                        <option value="1"
                                            {{ old('is_head_office', $office->is_head_office) == 1 ? 'selected' : '' }}>
                                            Yes
                                        </option>
                                    </select>
                                </div>

                                {{-- Status --}}
                                <div class="col-md-12">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select">
                                        <option value="1" {{ old('status', $office->status) == 1 ? 'selected' : '' }}>
                                            Active
                                        </option>
                                        <option value="0" {{ old('status', $office->status) == 0 ? 'selected' : '' }}>
                                            Inactive
                                        </option>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update Office
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
