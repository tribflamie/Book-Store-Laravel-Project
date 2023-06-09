@extends('layouts.layout-no-banner')
@section('title', 'Review your product')
@section('content')
    <!--=== Products Start ======-->
    <section>
        <div class="container">
            <h1 style="text-align:center">Product review</h1>
            <div class="row">
                <div class="col-md-12">
                    <form name="rating" action="/submitReview" onsubmit="return validateForm()">
                        <div class="table-responsive">
                            <table class="table table-bordered shop-cart">
                                <tbody>
                                    <?php $product = session()->get('reviewedProduct');
                                    session()->put('userID', $userID); ?>
                                    <tr>
                                        <td><img src="{{ asset('/images/shop/' . $product->photo) }}"></td>
                                        <td colspan="2">Name: {{ $product->name }}<br>Author:{{ $product->author }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Your rating:
                                        </td>
                                        <td name="rating">
                                            <p style="color:red" id="ratingCheck"></p>
                                            <input class="star star-5" id="star-5" type="radio" name="reviewRating"
                                                value="5" />
                                            <label class="star star-5" for="star-5"></label>
                                            <input class="star star-4" id="star-4" type="radio" name="reviewRating"
                                                value="4" />
                                            <label class="star star-4" for="star-4"></label>
                                            <input class="star star-3" id="star-3" type="radio" name="reviewRating"
                                                value="3" />
                                            <label class="star star-3" for="star-3"></label>
                                            <input class="star star-2" id="star-2" type="radio" name="reviewRating"
                                                value="2" />
                                            <label class="star star-2" for="star-2"></label>
                                            <input class="star star-1" id="star-1" type="radio" name="reviewRating"
                                                value="1" />
                                            <label class="star star-1" for="star-1"></label>
                                        </td>
                                        <td style="width:300px; border-left:none"><span class="ratingTxt"></span></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">Your comment<br>
                                            <p style="color:red" id="reviewCheck"></p>
                                            <textarea rows="7" cols="100" name="reviewContent"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><button type="submit">Post your review</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!--=== Products End ======-->
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            var result = "";
            $("input[name='reviewRating']").change(function() {
                if ($("input[name='reviewRating']:checked").val() == 5) result = "Very satisfied";
                else if ($("input[name='reviewRating']:checked").val() == 4) result = "Satisfied";
                else if ($("input[name='reviewRating']:checked").val() == 3) result = "Neutral";
                else if ($("input[name='reviewRating']:checked").val() == 2) result = "Disatisfied";
                else if ($("input[name='reviewRating']:checked").val() == 1) result = "Very disatisfied";
                $(".ratingTxt").text(result);
            });
        });

        function trimfield(str) {
            return str.replace(/[^A-Z0-9]/ig, "");
        }

        function validateForm() {
            let textRating = "",
                textReview = "";
            let x = 0;
            x = document.forms["rating"]["reviewRating"].value;
            var review = document.forms["rating"]["reviewContent"].value;;
            if (x == 0) {
                textRating = "Please rate the product!";
                document.getElementById("ratingCheck").innerHTML = textRating;
                return false;
            }
            let regex = /^fuck|cunt|nude|shit|ass|die|death|fck|fuk$/i;
            if (trimfield(review).match(regex)) {
                textReview = "Commennt cannot have explict words!";
                document.getElementById("reviewCheck").innerHTML = textReview;
                return false;
            }
            alert("Thank you for your review!");
            return true;
        }
    </script>
@endsection
