@props(['type','name','classname','label','placeholder'=>null,'required' => false,'values'=>[], 'class'=>''])

<div class="{{ $class }}">

    <label>{{ $label. ($required?' *':'')}}</label>
    @php
    if ($values == "")
    $values = []
    @endphp
    @forelse ($values as $value)
    @if ($loop->first)
    <div class="input-group control-group after-add-more-{{ $classname }}">
        <input value="{{ $value }}" type="{{ $type }}" name="{{ $name }}[]" class="form-control" placeholder="{{ $placeholder }}">
        <div class="input-group-btn">
            <button class="btn btn-success add-more-{{ $classname }}" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
        </div>
    </div>
    @else
    <div class="control-group input-group" style="margin-top:10px">
        <input value="{{ $value }}" type="{{ $type }}" name="{{ $name }}[]" class="form-control" placeholder="{{ $placeholder }}">
        <div class="input-group-btn">
            <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
        </div>
    </div>
    @endif
    @empty
    <div class="input-group control-group after-add-more-{{ $classname }}">
        <input type="{{ $type }}" name="{{ $name }}[]" class="form-control" placeholder="{{ $placeholder }}">
        <div class="input-group-btn">
            <button class="btn btn-success add-more-{{ $classname }}" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
        </div>
    </div>
    @endforelse
    <div class="copy-{{ $classname }} hide d-none">
        <div class="control-group input-group" style="margin-top:10px">
            <input type="{{ $type }}" name="{{ $name }}[]" class="form-control" placeholder="{{ $placeholder }}">
            <div class="input-group-btn">
                <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
            </div>
        </div>
    </div>


    <x-error-message :fieldName="$name" />
</div>
<script type="text/javascript">
    $(document).ready(function() {


      $(".add-more-{{ $classname }}").click(function(){ 
          console.log('test');
          var html = $(".copy-{{ $classname }}").html();
          $(".after-add-more-{{ $classname }}").after(html);
      });


      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });


    });


</script>