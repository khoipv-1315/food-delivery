<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">{{ trans('master.review') }}</h4>
        </div>
        <form action="{{ route('review.update', $review->id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="modal-body">
                <fieldset class="rating">
                    <input type="radio" id="star5" name="rating" value="10" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                    <input type="radio" id="star4half" name="rating" value="9" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                    <input type="radio"  id="star4" name="rating" value="8" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                    <input type="radio" id="star3half" name="rating" value="7" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                    <input type="radio" id="star3" name="rating" value="6" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                    <input type="radio" id="star2half" name="rating" value="5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                    <input type="radio" id="star2" name="rating" value="4" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                    <input type="radio" id="star1half" name="rating" value="3" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                    <input type="radio" id="star1" name="rating" value="2" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                    <input type="radio" id="starhalf" name="rating" value="1" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                </fieldset>
                <div class="bpr-form-review-body">
                    <textarea maxlength="1500" id="review_body" name="content" rows="5" placeholder="{{ trans('master.content' )}}">{{ $review->content }}</textarea>
                    <span class="bpr-form-message-error"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default">{{ trans('master.send') }}</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('master.close') }}</button>                           
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function (){
        $('input').each(function (){
            if (this.value == {{ $review->rate }}) this.checked = "checked";
        });
    });
</script>
