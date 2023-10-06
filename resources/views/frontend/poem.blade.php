@extends('frontend.poem_cat')
@section('content')

    <div class="container-fluid  mb-5">
        <div class="row mx-1">
            <div class="col-sm-2 col-md-2 col-lg-2 box ">
            </div>
            <div class="col-sm-8 col-md-8 col-lg-8 ">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12  ">
                        <div class=" poem_title">

                            <h4 class="text-primary m-auto">Poem</h4>
                            <h2>
                                Your Poem Title
                            </h2>
                            <img src="{{asset('assets/frontend/images/Rectangle 41.png')}}" class="image_icon" alt=""> <span>Poem</span> | 29th
                            November 2023
                            <br> <br>

                            <img src="{{asset('assets/frontend/images/Rectangle 42.png')}}" class="w-100 " alt="">
                            <hr>

                            <h3> <i class="fa-solid fa-circle fs-5"></i> Lorem</h3>
                            <hr>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis rerum a ducimus quod velit
                                suscipit, excepturi accusamus, impedit illum nemo cupiditate delectus iusto fugit!
                                Suscipit illum saepe soluta ex! Officia vel quae porro, debitis sapiente iste odio
                                aliquam aperiam saepe asperiores voluptates eos accusantium voluptate magnam eius
                                quibusdam tenetur deleniti consectetur ullam, doloribus provident numquam. Officia,
                                excepturi quasi. Molestiae maxime consequuntur dolor praesentium delectus, ipsam
                                deleniti, soluta adipisci rerum reiciendis commodi sapiente? Delectus voluptas
                                laudantium reiciendis natus amet cum repellat rerum, in deleniti, dolorem, tempore
                                nesciunt iste accusamus facilis asperiores! Exercitationem animi quo quas ratione
                                doloribus molestiae dolorem reiciendis sunt nemo eveniet, necessitatibus repellendus.
                                Vel vitae officiis quibusdam modi, quam nostrum exercitationem temporibus saepe
                                necessitatibus, accusamus totam nisi ad, odit facilis atque molestiae ipsa hic inventore
                                iure pariatur enim. Dolor voluptatum nobis modi a maxime molestiae. Voluptatibus, eaque
                                ab omnis, iusto deleniti ut vitae, labore similique cupiditate eveniet assumenda.
                                Quaerat minima, labore fugiat, omnis tempore veritatis, non repellat necessitatibus
                                error praesentium ipsum beatae libero exercitationem quos perspiciatis! Aliquid
                                repudiandae enim illo a ullam deserunt id rerum officia pariatur qui, maxime minus ab
                                porro totam quibusdam soluta aspernatur! Amet repellat sunt, ea dignissimos non
                                deleniti, natus officiis neque tenetur id in!</p>
                            <br>

                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima deserunt ex asperiores
                                repellat a eligendi minus quod eius impedit rerum quia nihil earum doloremque numquam
                                autem, similique tempore, quas, aliquid doloribus molestias nulla atque. Ad consequatur
                                repudiandae corporis. Dolorem distinctio fugit, deleniti, quam velit enim mollitia hic
                                totam porro quisquam et soluta! Esse veniam, enim maiores id sequi fuga at officia
                                accusantium deserunt praesentium debitis tempore, magni obcaecati illo ut iure odio?
                                Deserunt vitae, dolorem ratione velit quisquam doloremque totam quam excepturi nemo
                                delectus quibusdam omnis, aliquid odio obcaecati fugit placeat eligendi culpa ipsum
                                laboriosam tenetur! Corporis maiores vero aperiam enim. Facere officia neque eos ipsa
                                debitis, molestiae sapiente, repellat quasi quod minima, omnis culpa hic rem soluta!
                                Expedita esse, perferendis pariatur officiis omnis corrupti aspernatur minus accusantium
                                cumque veritatis soluta molestiae quos, voluptatibus temporibus dignissimos possimus
                                sapiente repellendus? Itaque, quas labore necessitatibus, perferendis vero corrupti
                                nulla aperiam iste reprehenderit illo distinctio ex possimus quidem! Quis voluptate
                                ullam laudantium hic dolorum eveniet veritatis dolorem nostrum corrupti. Molestias
                                voluptas perferendis, delectus in rerum inventore dignissimos recusandae cum corporis
                                rem, sed atque repellendus nulla cupiditate nesciunt qui aliquid, nobis fugit eaque ipsa
                                perspiciatis non? Modi molestiae et, consectetur cupiditate ab natus unde?</p>
                            <br>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia aut qui maxime excepturi!
                                Blanditiis, fuga.</p>
                            <div class=" mb-5"><input type="button"
                                    class="bg-white px-3 border-primary text-primary m-2" value="কবিতা">
                                <input type="button" class="bg-white px-3 border-primary text-primary m-2"
                                    value="কবিতা">
                                <input type="button" class="bg-white px-3 border-primary text-primary m-2"
                                    value="কবিতা">
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <h4>comment</h4>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6  ">
                                    <ul class="d-flex justify-content-end ">
                                        <li class="px-3"><i class="fa-brands fa-facebook"></i></li>
                                        <li class="px-3"><i class="fa-brands fa-twitter"></i></li>
                                        <li class="px-3"><i class="fa-solid fa-share-nodes"></i></li>
                                        <li class="px-3">
                                            <i class="fa-solid fa-bookmark"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-3">
                                <div class="col-2">
                                    <img src="{{asset('assets/frontend/images/Rectangle 14.png')}}" class="ad_img_2 mt-4 ms-5" alt="">
                                </div>
                                <div class="col-10 ">
                                    <label for="exampleFormControlTextarea1" class="form-label"></label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1"
                                        placeholder="Share Your Thoughts" rows="1"></textarea>

                                    <dvi class="d-flex justify-content-end"> <button type="submit"
                                            class="btn btn-primary px-5  mt-2">
                                            Comment</button>
                                    </dvi>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class=" col-sm-2 col-md-2 col-lg-2 box "></div>
        </div>
    </div>

@endsection('content')