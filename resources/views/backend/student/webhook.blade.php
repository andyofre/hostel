
@php

 $input = @file_get_contents("php://input");
 $event = json_decode($input);

 $my_event = $event->event;
 $status = $event->data->status;
 $webhook_source = $event->data->metadata->webhook_source;
 $id = $event->data->metadata->id;

 if ($my_event =="charge.success" && $status =="success" && $webhook_source=="portal_fee") {
 	// Update the table here

               $id = Auth::user()->id;

              User::where('id', $id)->update(['portalFee' => 'PAID']);

              if(Auth::user()->portalFee == 1){
                      dd('success status ');
              }else{
                  dd('Failed to change');
              }



 }


@endphp
