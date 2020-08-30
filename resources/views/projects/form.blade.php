@csrf

<div class="field mb-6">
    <label class="label text-sm mb-2 block" for="title">Title</label>

    <div class="control">
        <input
                type="text"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outlin"
                name="title"
                placeholder="I'have trouble with ..."
                required
                value="{{ $project->title }}">
    </div>
</div>

<div class="field mb-6">
    <label class="label text-sm mb-2 block" for="description">Description</label>

    <div class="control">
            <textarea
                name="description"
                rows="8"
                class="textarea shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outlin"
                placeholder="Describe your problem..."
                required>{{ $project->description }}</textarea>
    </div>
</div>

<div class="field">
    <div class="control">
        <button type="submit" class="bg-blue is-link mr-2 text-white rounded-lg no-underline text-sm py-2 px-5">{{ $buttonText }}</button>

        <a href="{{ $project->path() }}" class="text-default">Cancel</a>
    </div>
</div>


