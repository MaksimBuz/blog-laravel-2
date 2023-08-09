@php
    /** @var \App\Models\BlogCategory $item */
    /** @var \Illuminate\Support\Collection $categoryList */
@endphp
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title"></div>
                <div class="card-subtitle mb-2 text-muted"></div>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="maindata-tab" data-bs-toggle="pill" data-bs-target="#maindata" type="button" role="tab" aria-controls="maindata" aria-selected="true">Основные данные</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="adddata-tab" data-bs-toggle="pill" data-bs-target="#adddata" type="button" role="tab" aria-controls="adddata" aria-selected="false">Доп данные</button>
                    </li>
                  </ul>
                <br>
                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="maindata" role="tabpanel" aria-labelledby="maindata-tab">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input name="title" value="{{ $item->title }}" id="title" type="text"
                                class="form-control" minlength="3" required>
                                @error('title')
                                    <p>{{ $message }}</p>
                                 @enderror
                        </div>
                        <div class="form-group">
                            <label for="content_raw">Статья</label>
                            <textarea name="content_raw" rows="20 " id="content_raw" type="text" class="form-control">{{ old('content_raw', $item->content_raw) }} </textarea>
                            @error('content_raw')
                            <p>{{ $message }}</p>
                         @enderror
                        </div>
                    </div>

                    <div class="tab-pane fade show active" id="adddata" role="tabpanel" aria-labelledby="adddata-tab">
                        <div class="form-group">
                            <label for="category_id">категория</label>
                            <select name="category_id" value="{{ $item->category_id }}" id="category_id" type="text"
                                class="form-control" minlength="3" required>
                                @foreach ($categoryList as $categoryOption)
                                    <option value="{{ $categoryOption->id }}"
                                        @if ($categoryOption->id == $item->category_id) selected @endif>
                                        {{ $categoryOption->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <p>{{ $message }}</p>
                         @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug">Идентификатор</label>
                            <input name="slug" value="{{ old('slug', $item->slug) }}" id="slug" type="text"
                                class="form-control">
                                @error('slug')
                                <p>{{ $message }}</p>
                             @enderror
                        </div>
                        <div class="form-group">
                            <label for="excerpt">Выдержка</label>
                            <input name="excerpt" value="{{ old('excerpt', $item->excerpt) }}" id="excerpt"
                                type="text" class="form-control">
                                @error('excerpt')
                                <p>{{ $message }}</p>
                             @enderror
                        </div>

                        <div class="form-check">
                            <input name="is_published" type="hidden" value="0">
                            <input type="checkbox" name="is_published" class="form-check-input"
                                value="1"
                                @if ($item->is_published) checked="checked" @endif>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
