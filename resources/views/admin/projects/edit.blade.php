@extends('layouts.admin')

@section('content')
    <div class="container">

        <h2 class="fs-4 text-secondary my-4">
            {{ __('Project Edit Page for') }} {{ Auth::user()->name }}.
        </h2>
        <h3 class="fs-5 text-secondary">
            {{ __('Editing Project') }} ID: {{ $project->id }}
        </h3>

        <div class="row justify-content-center my-3">
            <div class="col">


                <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    @method('PUT')

                    <div class="mb-3">

                        <label for="title" class="form-label"><strong>Title</strong></label>

                        <input type="text" class="form-control" name="title" id="title"
                            aria-describedby="helpTitle" value="{{ old('title', $project->title) }}"> {{-- o il vecchio o il nuovo --}}

                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <label for="description" class="form-label"><strong>Description</strong></label>

                        <textarea class="form-control" name="description" id="description" aria-describedby="helpTitle" cols="30"
                            rows="5">{{ old('description') ? old('description') : $project->description }}</textarea>


                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="type_id" class="form-label">Types</label>
                        <select class="form-select @error('type_id') is-invalid  @enderror" name="type_id" id="type_id">
                            <option selected disabled>Select a type</option>
                            <option value="">Uncategorized</option>

                            @forelse ($types as $type)
                                <option value="{{ $type->id }}" {{ $type->id == old('type_id') ? 'selected' : '' }}>
                                    {{ $type->type }}</option>
                            @empty
                            @endforelse


                        </select>
                    </div>
                    @error('type_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    {{-- tech --}}
                    <div class="mb-3">

                        <label for="tech" class="form-label"><strong>Tech Used</strong></label>

                        <input type="text" class="form-control" name="tech" id="tech"
                            aria-describedby="helpTitle" value="{{ old('tech') ? old('tech') : $project->tech }}">

                        @error('tech')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <label for="github" class="form-label"><strong>GitHub Link</strong></label>

                        <input type="text" class="form-control" name="github" id="github"
                            aria-describedby="helpTitle" value="{{ old('github') ? old('github') : $project->github }}">

                        @error('github')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <label for="link" class="form-label"><strong>Project Link</strong></label>

                        <input type="text" class="form-control" name="link" id="link"
                            aria-describedby="helpTitle" value="{{ old('link') ? old('link') : $project->link }}">

                        @error('link')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <div class="mb-3">

                            @if (str_contains($project->thumb, 'http'))
                                <td><img class=" img-fluid" style="height: 100px" src="{{ $project->thumb }}"
                                        alt="{{ $project->title }}"></td>
                            @else
                                <td><img class=" img-fluid" style="height: 100px"
                                        src="{{ asset('storage/' . $project->thumb) }}"></td>
                            @endif

                        </div>

                        <label for="thumb" class="form-label"><strong>Choose a Thumbnail image file</strong></label>

                        <input type="file" class="form-control" name="thumb" id="thumb" placeholder="Cerca..."
                            aria-describedby="fileHelpThumb">

                        @error('thumb')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <button type="submit" class="btn btn-success my-3"><i class="fa-regular fa-floppy-disk"></i>
                        Save</button>
                    <a class="btn btn-primary" href="{{ route('admin.projects.index') }}"><i
                            class="fa-solid fa-circle-chevron-left"></i>
                        Go back</a>

                </form>
            </div>
        </div>

        {{-- <h1>ADMIN/PROJECTS/EDIT.BLADE</h1> --}}
    </div>
@endsection
