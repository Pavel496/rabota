@extends('layouts.front')

@section('content')
    <!-- Site header -->
    <header class="site-header size-lg text-center" style="background-image: url(/img/bg-banner1.jpg)">



       <div class="container">

        <div class="col-xs-12">
          <br><br>
          <h2>Более <mark>1000</mark> активных вакансий у нас на сайте!</h2>
          <h5 class="font-alt">Каждый день более 30 новых вакансий</h5>
          <br><br><br>


        {{--<form method="GET" action="{{ url('my-search') }}">
            <div class="row">
                <div class="col-md-8">
                    <input type="text" name="search" class="form-control" placeholder="Search" value="{{ old('search') }}">
                </div>
                <div class="col-md-4">
                    <button class="btn btn-success">Search</button>
                </div>
            </div>
        </form>--}}



          <form class="header-job-search" method="GET" action="{{ url('my-search') }}">
            <div class="input-keyword">
              <input type="text" name="search" class="form-control" placeholder="Условия расширенного поиска" value="{{ old('search') }}">
            </div>

            <div class="input-location">
              <label type="text" class="form-control" placeholder="Район, город или индекс">
            </div>

            <div class="btn-search">
              <button class="btn btn-primary" type="submit">Искать работу</button>
              {{-- <a href="job-list.html">Расширенный поиск</a> --}}
            </div>
          </form>



        </div>
      </div>

      <br>
      <p class="text-center"><a class="btn btn-info" href="/">Посмотреть все вакансии</a></p>
      
    </header>
    <!-- END Site header -->


    <!-- Main container -->
    <main>



      <!-- Recent jobs -->
      <section>
        <div class="container">
          <header class="section-header">
            <span>Свежее</span>
            <h2>Новые вакансии</h2>
          </header>

          <div class="row item-blocks-connected">

            <!-- Job item -->
            @foreach($vacancies as $vacancy)
            <div class="col-xs-12">
              <a class="item-block" href="#">
                <header>
<!--                  <img src="/img/logo.png" alt="">-->
                  <div class="hgroup">
                    <h4>{{ $vacancy->title }}</h4>
                    <h5>{{ $vacancy->text }}</h5>
                   {{--@foreach ($vacancy->sphere_id as $singleSphereId)
                        <span class="label label-info label-many">{{ $singleSphereId->title }}</span>
                    @endforeach--}}

                  </div>
<!--                  <div class="header-meta">-->
                    <span class="location">{{ $vacancy->company_address }}</span>
                    <h5>{{ $vacancy->phone_temp }}</h5>

                    {{--@foreach ($vacancy->schedule_id as $singleScheduleId)
                        <span class="label label-success label-many">
                        {{ $singleScheduleId->title }}</span>
                    @endforeach--}}

<!--                  </div>-->
                </header>
              </a>
            </div>
            <!-- END Job item -->
            @endforeach

          </div>
@if ($mylink)
  {{ $vacancies->links() }}
@endif
          <br><br>
          <p class="text-center"><a class="btn btn-info" href="/">Посмотреть все вакансии</a></p>
        </div>



      </section>
      <!-- END Recent jobs -->


      <!-- Facts -->
      <section class="bg-img bg-repeat no-overlay section-sm" style="background-image: url(/img/bg-pattern.png)">
        <div class="container">

          <div class="row">
            <div class="counter col-md-4 col-sm-6">
              <p><span data-from="0" data-to="1111"></span>+</p>
              <h6>Вакансий</h6>
            </div>

{{--            <div class="counter col-md-3 col-sm-6">
              <p><span data-from="0" data-to="1200"></span>+</p>
              <h6>Members</h6>
            </div>--}}

            <div class="counter col-md-4 col-sm-6">
              <p><span data-from="0" data-to="100"></span>+</p>
              <h6>Резюме</h6>
            </div>

            <div class="counter col-md-4 col-sm-6">
              <p><span data-from="0" data-to="1500"></span>+</p>
              <h6>Организаций</h6>
            </div>
          </div>

        </div>
      </section>
      <!-- END Facts -->


      <!-- How it works -->
      <section>
        <div class="container">

          <div class="col-sm-12 col-md-6">
            <header class="section-header text-left">
              {{--<span>Workflow</span>--}}
              <h2>О нашем сервисе</h2>
            </header>

            <p class="lead">При поиске работы в Гатчине многие сталкиваются с проблемой поиска вакансий. Наш сервис позволяет решить эту проблему. Мы собираем вакансии Гатчины со всего интернета и публикуем их в одном месте. Если у Вас есть предложения или рекомендации по нашему сервису пишите на почту <a href="info@rabota-gtn.ru">info@rabota-gtn.ru</a></p>
            <p>Если Вы ищите работу, то можете разместить Ваше резюме и получать звонки от работодателей. Главное не забывать поднимать Ваше резюме каждые 14 дней. </p>


            <br><br>
            {{--<a class="btn btn-primary" href="page-typography.html">Learn more</a>--}}
          </div>

          <div class="col-sm-12 col-md-6 hidden-xs hidden-sm">
            <br>
            <img class="center-block" src="/img/how-it-works.png" alt="how it works">
          </div>

        </div>
      </section>
      <!-- END How it works -->


      <!-- Categories -->
      <section class="bg-alt">
        <div class="container">
          <header class="section-header">
            {{--<span>Categories</span>--}}
            <h2>Самые популярные вакансии</h2>
            <p>В данных категориях больше всего открытых вакансий</p>
          </header>

          <div class="category-grid">
            <a href="job-list-1.html">
              <i class="fa fa-bus"></i>
              <h6>Транспорт</h6>
              <p>Водители</p>
            </a>

            <a href="job-list-2.html">
              <i class="fa fa-line-chart"></i>
              <h6>Учет</h6>
              <p>Бухгалтеры</p>
            </a>

            <a href="job-list-3.html">
              <i class="fa fa-medkit"></i>
              <h6>Медицина</h6>
              <p>Сестры по уходу, клининг менеджеры</p>
            </a>

            {{--<a href="job-list-1.html">
              <i class="fa fa-cutlery"></i>
              <h6>Food</h6>
              <p>Restaurant, Food service, Coffe shop, Cashier, Waitress</p>
            </a>

            <a href="job-list-2.html">
              <i class="fa fa-newspaper-o"></i>
              <h6>Media</h6>
              <p>Journalism, Newspaper, Reporter, Writer, Cameraman</p>
            </a>

            <a href="job-list-3.html">
              <i class="fa fa-institution"></i>
              <h6>Government</h6>
              <p>Federal, Law, Human resource, Manager, Biologist</p>
            </a>--}}
          </div>

        </div>
      </section>
      <!-- END Categories -->


      <!-- Newsletter -->
      <section class="bg-img text-center" style="background-image: url(/img/bg-facts.jpg)">
        <div class="container">

            <p class="text-center"><a class="btn btn-info" href="{{ route('auth.login') }}">Добавить вакансию</a></p>
            <br>
            <p class="text-center"><a class="btn btn-info" href="{{ route('auth.login') }}">Добавить резюме</a></p>

          {{--<h2><strong>Subscribe</strong></h2>
          <h6 class="font-alt">Get weekly top new jobs delivered to your inbox</h6>
          <br><br>
          <form class="form-subscribe" action="#">
            <div class="input-group">
              <input type="text" class="form-control input-lg" placeholder="Your eamil address">
              <span class="input-group-btn">
                <button class="btn btn-success btn-lg" type="submit">Subscribe</button>
              </span>
            </div>
          </form>--}}
        </div>
      </section>
      <!-- END Newsletter -->


    </main>
    <!-- END Main container -->
@stop
