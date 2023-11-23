<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Edit Book') }}
    </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                    <form method="POST" action="{{ route('books.update', $book) }}" class="flex flex-col gap-3">
                        @csrf
                        @method('patch')


                        <x-input-label value="Title:" />
                        <x-text-input name="title" value="{{ old('title', $book->title) }}" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />

                        <x-input-label value="Year:"/>
                        <x-text-input name="release_date" value="{{ old('release_date', $book->release_date) }}" /> 
                        <x-input-error :messages="$errors->get('release_date')" class="mt-2" />

                        <x-input-label value="Price:"/>
                        <x-text-input name="price" value="{{ old('price', $book->price) }}" />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />

                        <x-input-label value="Type:"/>
                        <select name="type"class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <option value="new" {{ $book->type == "new" ? "selected" : ""}}>New</option>
                            <option value="used" {{ $book->type == "used" ? "selected" : ""}}>Used</option>
                            <option value="ebook" {{ $book->type == "ebook" ? "selected" : ""}}>ebook</option>
                        </select>

                        <div class="mt-4 space-x-2">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                            <a href="{{ route('books.index') }}">{{ __('Cancel') }}</a>
                        </div>
                    </form>
                
    </div>
                <div class="p-6 text-gray-900">
                    <x-input-label class="text-xl" value="Authors:" />

                 @foreach ($book->authors as $author)
                            
                    <div class="flex border-b justify-between items-center">
                        {{ $author->first_name }} {{ $author->last_name }} 
                        <div class=" pt-2">
                         

                          <form method="POST" action="{{ route('book.detach.author', $book) }}">
                              @csrf
                              @method('delete')
                              <input type="hidden" value="{{$author->id}}" name="author_id">
                              <x-danger-button onclick="event.preventDefault(); this.closest('form').submit();">
                                  Delete
                              </x-danger-button>
                          </form>
                        </div>
                    </div>
                    
                @endforeach
                
                <form method="POST" action="{{ route('book.attach.author', $book) }}">
                        @csrf
                        @method('post')

                        <x-input-label for="author_id" value="Add author:"/>
                        <select name="author_id" id="author_id"
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            @foreach ($authors as $author)

                            <option value="{{ $author->id }}">{{ $author->first_name }} {{ $author->last_name }} </option>

                            @endforeach

                        </select>

                        <div class="mt-4 space-x-2">
                            <x-primary-button type="submit" >{{ __('Add') }}</x-primary-button>

                        </div>
                    </form>
                
    </div>
                        </div>
                    </div>
                       
                 
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>