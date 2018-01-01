@extends("admin.layouts.master")
@section("style")
    .ingredient{
    font-size:6px;
    border-bottom: 1px dotted gray;
    margin:0 4px 0 4px;
    }
@endsection
@section("inner")
    <div class="container">
        <div class="row align-items-center justify-content-center col-md-12">
            <div class="card col-md-12">
                <div class="card-body">
                    <form action="{{route("admin.post.store")}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="標題" name="title"><hr>
                        </div>
                        <div class="row">
                            <div class="upload-logo col-md-6">
                                <label for="logo_pic">
                                    <img id="logo_pic_img" data-src="holder.js/300x300" class="rounded mx-auto d-block" alt="300x300" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22200%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20200%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1609bc2ab9b%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1609bc2ab9b%22%3E%3Crect%20width%3D%22200%22%20height%3D%22200%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2274.4296875%22%20y%3D%22104.5%22%3E300x300%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 300px; height: 300px;">
                                    <input name="logo_pic" id="logo_pic" type="file" class="inputFile"  style="display:none" onChange="showPreview(this);" />
                                </label>
                                <div class="form-group">
                                    <label for="exampleTextarea"><h5>簡介</h5></label>
                                    <textarea class="form-control" id="exampleTextarea" rows="4" name="description"></textarea>
                                </div>
                            </div>
                            <div class="form-g col-md-6">
                                <div class="form-group">
                                    <label for="disabledSelect">食譜類別</label>
                                    <select id="Select" class="form-control" name="category_id">
                                        @foreach($cates as $cate)
                                            <option value="{{$cate->id}}">{{$cate->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label >食材</label>
                                <div class="col-md-12 row ingredients" data-row="1">
                                    <div class="ingredientbox row">
                                        <div class="col-6">
                                            <input type="text" class="form-control" id="formGroupExampleInput" name="ingredient[]" placeholder="食材">
                                        </div>
                                        <div class="col-4">
                                            <input type="text" class="form-control" id="formGroupExampleInput" name="mount[]" placeholder="份量">
                                        </div>
                                        <div class="col-2">
                                            <svg id="i-plus" viewBox="0 0 32 32" width="16" height="16" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" onclick="adding()">
                                                <path d="M16 2 L16 30 M2 16 L30 16" />
                                            </svg>
                                            <svg id="i-minus" viewBox="0 0 32 32" width="16" height="16" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" onclick="deling(this)">
                                                <path d="M2 16 L30 16" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="card col-md-12 mt-3 steps" data-row="1">
                            <div class="appendforstep">
                                <div class="card-body step" data-step="1">
                                    <div class="row">
                                        <div class="pic col-md-3">
                                            <label for="step_pic_1" class="label_step_pic">
                                                <img id="step_pic_1_img" class="step_pic_img" data-src="holder.js/100x100" class="rounded mx-auto d-block" alt="100x100" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22200%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20200%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1609bc2ab9b%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1609bc2ab9b%22%3E%3Crect%20width%3D%22200%22%20height%3D%22200%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2274.4296875%22%20y%3D%22104.5%22%3E300x300%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 100px; height: 100px;">
                                                <input name="step_pic[]" id="step_pic_1" type="file" class="inputFile step_pic"  style="display:none" onChange="showPreview(this);" />
                                            </label>
                                        </div>
                                        <div class="word col-md-9">
                                            <div class="card-title">
                                                <span class="float-left step-num"><h3>1</h3></span>
                                                <span class="float-right">
                                                <div class="col-2">
                                                    <svg id="i-plus" viewBox="0 0 32 32" width="16" height="16" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" onclick="addstep()">
                                                        <path d="M16 2 L16 30 M2 16 L30 16" />
                                                    </svg>
                                                    <svg id="i-minus" viewBox="0 0 32 32" width="16" height="16" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" onclick="delstep(this)">
                                                        <path d="M2 16 L30 16" />
                                                    </svg>
                                                </div>
                                            </span>
                                            </div>
                                            <p class="card-text"><textarea class="form-control" id="exampleTextarea" rows="2" name="step[]"></textarea></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-secondary btn-lg btn-block mt-3">送出</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section("javascript")
    var ing = $(".ingredientbox").parent().html();
    var ingrows = parseInt($(".ingredients").attr("data-row"));
    function adding(){
        $(".ingredients").append(ing);
        ingrows += 1;
    }
    function deling(obj){
        if(ingrows>1){
            $(obj).parent().parent().remove();
            ingrows -= 1;
        }
    }

    var steprows = parseInt($(".steps").attr("data-row"));
    function addstep(){
        var stephtml = $(".appendforstep").html();
        $(".steps").append(stephtml);
        steprows += 1;
        updatesteps();
    }
    function delstep(obj){
        if(steprows>1){
            $(obj).parent().parent().parent().parent().parent().parent().remove();
            steprows -= 1;
            updatesteps();
        }
    }

    function updatesteps(){
        $(".step").each(function(s,index){
            $(this).find("h3").html(s+1);
            $(this).find(".step_pic").attr("id","step_pic_"+(s+1));
            $(this).find(".label_step_pic").attr("for","step_pic_"+(s+1));
            $(this).find(".step_pic_img").attr("id","step_pic_"+(s+1)+"_img");
        });
    }

    function showPreview(obj){
        if(obj.files && obj.files[0]){
            var name = $(obj).attr("id");
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#"+name+"_img").attr('src', e.target.result);
            }
            reader.readAsDataURL(obj.files[0]);
        }
    }
@endsection