<div class="">
            <ul class="nav flex-column my-account-menu">
              @php
                $route_name = request()->route()->getName();
              @endphp
              <li class="nav-item">                
                <a class="nav-link {{($route_name=='my-profie')?'active':''}}" aria-current="page" href="{{route('my-profie')}}">
                  <span class="span-ic"><i class="fa fa-user"></i></span>
                  <span>Personal Details</span>                   
                </a>
              </li>
              <li class="nav-item">                
                <a class="nav-link {{($route_name=='add-credit')?'active':''}}" href="{{route('add-credit')}}">
                   <span class="span-ic"><i class="fa fa-credit-card"></i></span>
                   <span>Add Credit</span>
               </a>
              </li>
              <li class="nav-item">                
                <a class="nav-link {{($route_name=='withdraw-credit')?'active':''}}" href="{{route('withdraw-credit')}}">
                   <span class="span-ic"><i class="fa fa-money"></i></span>
                   <span>Withdraw Credit</span>
               </a>
              </li>
            </ul>
         </div>