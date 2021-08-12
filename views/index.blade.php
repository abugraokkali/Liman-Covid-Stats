<ul class="nav nav-tabs" role="tablist" style="margin-bottom: 15px;">
    <li class="nav-item">
        <a class="nav-link active" onclick="listCountries()" href="#countries" data-toggle="tab">
            <i class="fas fa-flag"></i> {{ __("Ülkelerde COVID-19") }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" onclick="listGlobal()" href="#global" data-toggle="tab">
            <i class="fas fa-globe-americas"></i> {{ __("Dünyada COVID-19") }}
        </a>
    </li>
</ul>

<div class="tab-content">
    <div id="countries" class="tab-pane active">
        @include('countries.main')
    </div>
    <div id="global" class="tab-pane">
        @include('global.main')
    </div>

</div>

<script>
    
    if(location.hash === ""){
        listCountries();
    }
</script>