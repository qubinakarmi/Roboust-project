@extends('admin.layouts.app2')
@section('title', 'Add Counter')

@section('content')

    <main class="app-main">
        <div class="app-content">
            <div class="container-fluid">

                <div class="card card-info card-outline">

                    <!-- Header -->
                    <div class="card-header">
                        <h3 class="card-title">Counter Form</h3>
                    </div>

                    <form action="{{ route('counter.update',$counters->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <div class="row g-3">

                                <!-- Title -->
                                <div class="col-md-12">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" value="{{ old('title',$counters->title) }}">


                                     @error('title')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="col-md-12">
                                    <label class="form-label">Description</label>
                                    <textarea id="editor" name="description" class="form-control">{{ old('title',$counters->title) }}</textarea>
                                
                                 @error('description')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Number -->
                                <div class="col-md-12">
                                    <label class="form-label">Number</label>
                                    <input type="number" name="number" class="form-control" placeholder="Example: 500"  value="{{ old('number',$counters->number) }}">
                                
                                
                                 @error('number')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Prefix -->
                                <div class="col-md-12">
                                    <label class="form-label">Prefix</label>
                                    <input type="text" name="prefix" class="form-control" placeholder="Example: + or $" value="{{ old('prefix',$counters->prefix) }}">
                               
                                @error('prefix')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                               
                                </div>

                                <!-- Suffix -->
                                <div class="col-md-12">
                                    <label class="form-label">Suffix</label>
                                    <input type="text" name="suffix" class="form-control" placeholder="Example: + or K" value="{{ old('suffix',$counters->suffix) }}">
                                
                                 @error('suffix')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                
                                </div>

                                <!-- Icon -->
                                <div class="col-md-12">
                                    <label class="form-label">Icon</label>
                                    <input type="text" name="icon" class="form-control"
                                        placeholder="Example: fa-solid fa-users" value="{{ old('icon',$counters->icon) }}">
                                
                                  @error('icon')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                
                                    </div>

                                <!-- Status -->
                                <div class="col-md-12">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="1" {{ $counters->status == 1 ? 'selected' : ''  }}>Active</option>
                                        <option value="0" {{ $counters->status == 0 ? 'selected' : ''  }}>Inactive</option>
                                    </select>


                                     @error('icon')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror 
                                </div>

                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Save Counter</button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </main>

@endsection
