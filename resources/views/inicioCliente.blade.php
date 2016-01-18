@extends('base')
@section('title', 'Panel Principal')
@section('ini', 'active')

@section('content')

<div class="main">
  <div class="main-inner">
    <div class="container alto">
      <div class="row">
        @include ('flash::message')
        <div class="span6">
          <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Servicios </h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="span12">
                <br>
                <p>
                  cantidad total de servicios: <button class=="btn btn-default">{{ $cantidad }}</button>
                </p>
              </div>
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Servicio</th>
                    <th>Estado</th>
                    <th>Registro</th>
                    <th>Actualización</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($servicio as $servicio)
                    <tr>
                      <td>{{ $servicio->tipo->nombre }}</td>
                      <td>
                        @if ($servicio->status == 1)
                          <span class="text-warning">Solicitado</span>
                        @elseif ($servicio->status == 2)
                          <span class="text-primary">Procesando</span>
                        @else
                          <span class="text-success">Finalizado</span>
                        @endif
                      </td>
                      <td>{{ $servicio->created_at->format('d/m/Y h:i:s A') }}</td>
                      <td>{{ $servicio->updated_at->diffForHumans() }}</td>
                      <td><a href="{{ URL::to('servicios/' . $servicio->id) }}"><i class="icon-arrow-right"></i></a></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <div class=" text-center">
                <ul class="pagination">
                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /widget-content -->
          </div>
          <!-- /widget -->
        </div>
        <!-- /span6 -->
        <div class="span6">
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Recent News</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <ul class="news-items">
                <li>
                  <div class="news-item-date"> <span class="news-item-day">29</span> <span class="news-item-month">Aug</span> </div>
                  <div class="news-item-detail"> <a href="http://www.egrappler.com/thursday-roundup-40/" class="news-item-title" target="_blank">Thursday Roundup # 40</a>
                    <p class="news-item-preview"> This is our web design and development news series where we share our favorite design/development related articles, resources, tutorials and awesome freebies. </p>
                  </div>
                </li>
                <li>
                  <div class="news-item-date"> <span class="news-item-day">15</span> <span class="news-item-month">Jun</span> </div>
                  <div class="news-item-detail"> <a href="http://www.egrappler.com/retina-ready-responsive-app-landing-page-website-template-app-landing/" class="news-item-title" target="_blank">Retina Ready Responsive App Landing Page Website Template – App Landing</a>
                    <p class="news-item-preview"> App Landing is a retina ready responsive app landing page website template perfect for software and application developers and small business owners looking to promote their iPhone, iPad, Android Apps and software products.</p>
                  </div>
                </li>
                <li>
                  <div class="news-item-date"> <span class="news-item-day">29</span> <span class="news-item-month">Oct</span> </div>
                  <div class="news-item-detail"> <a href="http://www.egrappler.com/open-source-jquery-php-ajax-contact-form-templates-with-captcha-formify/" class="news-item-title" target="_blank">Open Source jQuery PHP Ajax Contact Form Templates With Captcha: Formify</a>
                    <p class="news-item-preview"> Formify is a contribution to lessen the pain of creating contact forms. The collection contains six different forms that are commonly used. These open source contact forms can be customized as well to suit the need for your website/application.</p>
                  </div>
                </li>
              </ul>
            </div>
            <!-- /widget-content -->
          </div>
          <!-- /widget -->
        </div>
        <!-- /span6 -->
      </div>
      <!-- /row -->
    </div>
    <!-- /container -->
  </div>
  <!-- /main-inner -->
</div>

@stop