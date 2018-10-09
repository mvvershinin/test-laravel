<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <title>Поиск</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        
    </head>
    <body>
        <div id="app" class="jumbotron">
            <div class="container">
                <div v-if="errorQuery" class="alert alert-danger" role="alert">
                    Значение не может быть пустым
                </div>
                <form class="search"></form>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
                            <div class="form-group">
                                <input type="text" class="form-control" v-model="query" name="search-value" value="{{ old('search-value') }}" required>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                            <div class="form-group">
                                <button type="submit" class="btn btn-info btn-block" v-on:click="startSearch()">Искать</button>
                            </div>
                        </div>
                    </div>
                
                
                <div id="list" class="row">

                    <!--doctors-->
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4"> 
                        <h3 class="d-flex justify-content-center">Доктора
                            <span v-if=afterquery class="badge badge-info"> @{{ doctors.total }}
                            </span>
                        </h3>
                        <div v-if=afterquery class="list-group-item" v-for="item in doctorsitems">
                            @{{ item.surname }}  @{{ item.name }} @{{ item.patronymic }}
                        </div>
                        <div v-if=afterquery class="d-flex justify-content-center btn-group"> 
                            
                            <button type="submit" class="btn btn-info" v-on:click="pageDoctorsSearch(doctors.first_page_url)"><<</button>
                            <button type="submit" class="btn btn-info" v-on:click="pageDoctorsSearch(doctors.prev_page_url)"><</button>
                            <button type="submit" class="btn btn-disabled"> @{{ doctors.current_page }} </button>
                            
                            <button type="submit" class="btn btn-info" v-on:click="pageDoctorsSearch(doctors.next_page_url)">></button>
                            <button type="submit" class="btn btn-info" v-on:click="pageDoctorsSearch(doctors.last_page_url)">>></button>
                        </div>
                    </div> 

                    <!--hospitals-->                
                    <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5"> 
                        <h3 class="d-flex justify-content-center">Больницы
                            <span v-if=afterquery class="badge badge-info"> @{{ hospitals.total }}
                            </span>
                        </h3>

                        <div v-if=afterquery class="list-group-item" v-for="item in hospitalsitems">
                            @{{ item.title }}
                        </div>
                        <div v-if=afterquery class="d-flex justify-content-center btn-group"> 
                            
                            <button type="submit" class="btn btn-info" v-on:click="pageHospitalsSearch(hospitals.first_page_url)"><<</button>
                            <button type="submit" class="btn btn-info" v-on:click="pageHospitalsSearch(hospitals.prev_page_url)"><</button>
                            <button type="submit" class="btn btn-disabled"> @{{ hospitals.current_page }} </button>
                            
                            <button type="submit" class="btn btn-info" v-on:click="pageHospitalsSearch(hospitals.next_page_url)">></button>
                            <button type="submit" class="btn btn-info" v-on:click="pageHospitalsSearch(hospitals.last_page_url)">>></button>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3"> 
                        <h3 class="d-flex justify-content-center">Услуги
                            <span v-if=afterquery class="badge badge-info"> @{{ services.total }}
                            </span>
                        </h3>

                        <div v-if=afterquery class="list-group-item" v-for="item in servicesitems">
                            @{{ item.title }}
                        </div>
                        <div v-if=afterquery class="d-flex justify-content-center btn-group"> 
                            
                            <button type="submit" class="btn btn-info" v-on:click="pageServicesSearch(services.first_page_url)"><<</button>
                            <button type="submit" class="btn btn-info" v-on:click="pageServicesSearch(services.prev_page_url)"><</button>
                            <button type="submit" class="btn btn-disabled"> @{{ services.current_page }} </button>
                            
                            <button type="submit" class="btn btn-info" v-on:click="pageServicesSearch(services.next_page_url)">></button>
                            <button type="submit" class="btn btn-info" v-on:click="pageServicesSearch(services.last_page_url)">>></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    
</html>
