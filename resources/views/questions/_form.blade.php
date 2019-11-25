@csrf
<div class="form-group">
  <label for="title">Question Title :</label>
<input type="title" class="form-control" id="title" name="title" vlaue="{{ old('title') }}">
</div>

<div class="form-group">
        <label for="question_body">Question body :</label>
      <textarea class="form-control" name="body">
          
      </textarea>
 </div>

<button type="submit" class="btn btn-primary">{{$buttonText}}</button>