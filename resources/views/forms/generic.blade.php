@foreach($model->formColumns as $column => $attr)
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">{{$attr['label']}}</label>
        <div class="col-sm-10">
            @if($attr['type'] === 'html')
                <textarea name="{{$column}}" id="editor">{{$model->$column}}</textarea>
            @elseif($attr['type'] === 'relationship')
                <select name="{{$column}}" required>
                    <option disabled selected>Please select</option>
                    @foreach((new $attr['model'])->all() as $relationModel)
                        @php($relationColumn = $attr['relation_column'])
                        <option @if($relationModel->id == $model->$column) selected
                                @endif value="{{$relationModel->id}}">{{$relationModel->$relationColumn}}</option>
                    @endforeach
                </select>
            @elseif($attr['type'] === 'password')

                <input name="{{$column}}" type="{{$attr['type']}}"
                       @if(!str_contains(request()->route()->getName(), 'edit')) readonly @endif class="form-control"
                       value="">
            @elseif($attr['type'] === 'checkbox')
                <input class="form-check-input" name="{{$column}}" type="{{$attr['type']}}"
                       @if($model->$column) checked @endif>
            @else
                <input name="{{$column}}" type="{{$attr['type']}}"
                       @if(
    str_contains(request()->route()->getName(), 'edit')
    || str_contains(request()->route()->getName(), 'create')
    )
                       @else
                       readonly
                       @endif class="form-control"
                       value="{{str_contains(request()->route()->getName(), 'create') ? "" :$model->$column}}">
            @endif
        </div>
    </div>
@endforeach
