@extends('layout.layout')

@section('content')
	<div class="col-md-12">
	     <div class="col-md-6">
			  <div class="form-group">
			    <label for="repartidor">Repartidor</label>
			    <select class="form-control" name="repartidor" id="repartidor">
			       <option>Seleccionar</option>
			       @foreach($repartidor as $key=>$value)
			       <option value="{{ $key }}">{{ $value }}</option>
			       @endforeach
			    </select>
			  </div>
		  </div>
		  <div class="col-md-6">
			  <div class="form-group">
			    <button type="button" id="buscar" class="btn btn-primary">Consultar</button>
			  </div>
		  </div>

		  <div class="row">
			  

		      <div class="col-md-6">
		          <div class="form-group">
		            <label for="total_lotes_entre" class="col-form-label">Total Lotes Entregados</label>
		            <input type="text" class="form-control" id="total_lotes_entre" name="total_lotes_entre" readonly>
		          </div>
		      </div>

		      <div class="col-md-6">
		          <div class="form-group">
		            <label for="total_base" class="col-form-label">Total Base</label>
		            <input type="text" class="form-control" id="total_base" name="total_base" readonly>
		          </div>
		      </div>

		      <div class="col-md-6">
		          <div class="form-group">
		            <label for="total_lotes_devuel" class="col-form-label">Total Lotes Devueltos</label>
		            <input type="text" class="form-control" id="total_lotes_devuel" name="total_lotes_devuel" readonly>
		          </div>
		      </div>

		      <div class="col-md-6">
		          <div class="form-group">
		            <label for="total_pagar" class="col-form-label">Total a Pagar</label>
		            <input type="text" class="form-control" id="total_pagar" name="total_pagar" readonly>
		          </div>
		      </div>

	      </div>
		  

		<div class="table-responsive">
			<table id="dataTable" class="table table-bordered data-table-jquery">
				<thead>
					<tr>
		        		<td class="center"><b>FECHA DE NOMINA</b></td>
		    			<td class="center"><b>REPARTIDOR</b></td>
		    			<td class="center"><b>CAMIÓN</b></td>
		            	<td class="center"><b>FINCA</b></td>
		    			<td class="center"><b>CANTIDAD LOTES</b></td>
		    			<td class="center"><b>LOTES ENTREGADOS</b></td>
		    			<td class="center"><b>LOTES DEVUELTOS</b></td>
		    			<td class="center"><b>FECHA DE CREACIÓN</b></td>
				        
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
		</div>
	</div>

@endsection
@section('script')
	<script src="{{ asset('js/manifiesto.js') }}"></script>
@endsection