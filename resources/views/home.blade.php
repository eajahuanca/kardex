@extends('layouts.init')

@section('styles')
	<link rel="stylesheet" href="{{ asset('plugin/assets/css/fullcalendar.min.css') }}" />
@endsection

@section('actual','')
@section('titulo','Calendario')
@section('detalle','calendario de la gestión')

@section('cuerpo')
    <div class="row">
    	<div class="col-sm-1"></div>
    	<div class="col-sm-10">
    		<div id="calendar"></div>
    	</div>
    	<div class="col-sm-1"></div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('plugin/assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('plugin/assets/js/fullcalendar.min.js') }}"></script>
    <script type="text/javascript">
		jQuery(function($) {
		/* initialize the calendar */
			var date = new Date();
			var d = date.getDate();
			var m = date.getMonth();
			var y = date.getFullYear();
			var calendar = $('#calendar').fullCalendar({
				buttonHtml: {
					prev: '<i class="ace-icon fa fa-chevron-left"></i>',
					next: '<i class="ace-icon fa fa-chevron-right"></i>'
				},
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'month,agendaWeek,agendaDay'
				},
				events: []
				,
				editable: true,
				droppable: true,
				
			});
		})
	</script>
@endsection