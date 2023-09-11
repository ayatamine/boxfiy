@extends('layouts.app')
@section('title','Api Documentation')
@push('style-c')
<link rel="stylesheet" href="{{asset('BoxfiyV6/css/api.css')}}">
@endpush
@section('content')
<div>
  <!--Start Header Part-->
  <div class="container">
    <div class="row">
      <div class="Header-part">
        <div class="taps">
          <section class="api activ">API</section>
          <section class="ex ">Example Of Code</section>
        </div>
        <ul id="Top-part" class="grid grid-cols-2">
          <li class="col-6">HTTP METHOD</li>
          <li class="col-6">POST</li>
        </ul>

        <ul class="grid grid-cols-2">
          <li class="col-6">API URL</li>
          <li class="col-6"> <a class="text-blue-700 hover:text-blue-700" href="{{env('API_LINK')}}">Click Here</a>
          </li>
        </ul>

        <ul class="grid grid-cols-2">
          <li class="col-6">Response format </li>
          <li class="col-6">JSON</li>
        </ul>
      </div>
    </div>

  </div>
  <!--end Header Part-->

  <!--Service list-->
  <div class="container">
    <div class="row">
      <div class="table">
        <div class="code-part">
          <div class="taps">
            <section style="padding: 20px;background-color:#2e384c;" class=" tap2 activ">Service List</section>
          </div>
          <ul id="Top-part" class="grid grid-cols-2">
            <li class="col-6">Parameters</li>
            <li class="col-6">DESCRIPTION</li>
          </ul>

          <ul class="grid grid-cols-2">
            <li class="col-6">key</li>
            <li class="col-6">Your API key</li>
          </ul>

          <ul class="grid grid-cols-2">
            <li class="col-6">action</li>
            <li class="col-6">services</li>
          </ul>
          <ul class="grid grid-cols-2">
            <li class="col-6">Example Response</li>
            <li class="col-6"></li>
          </ul>
          <div class="code">
            <i onclick="copy(event)" id="copy" class="fa-solid fa-copy"></i>
            <span class="right-btns"></span>
            <p id="code">
              [
              {
              "service": 1,
              "name": "Followers",
              "type": "Default",
              "category": "First Category",
              "rate": "0.90",
              "min": "50",
              "max": "10000",
              "refill": true,
              "cancel": true
              },
              {
              "service": 2,
              "name": "Comments",
              "type": "Custom Comments",
              "category": "Second Category",
              "rate": "8",
              "min": "10",
              "max": "1500",
              "refill": false,
              "cancel": true
              }
              ]

            </p>
          </div>
        </div>
      </div>

    </div>

  </div>
  <!--Add  order -->
  <div class="container">
    <div class="row">
      <div class="table">
        <div class="code-part">
          <div class="taps">
            <section style="padding: 20px;background-color:#2e384c;" class=" tap2 activ">Add Order</section>
          </div>
          <ul id="Top-part" class="grid grid-cols-2">
            <li class="col-6">Parameters</li>
            <li class="col-6">DESCRIPTION</li>
          </ul>

          <ul class="grid grid-cols-2">
            <li class="col-6">key</li>
            <li class="col-6">Your API key</li>
          </ul>

          <ul class="grid grid-cols-2">
            <li class="col-6">action</li>
            <li class="col-6">add</li>
          </ul>
          <ul class="grid grid-cols-2">
            <li class="col-6">service</li>
            <li class="col-6">Service Id</li>
          </ul>
          <ul class="grid grid-cols-2">
            <li class="col-6">link</li>
            <li class="col-6">The link to your social element</li>
          </ul>
          <ul class="grid grid-cols-2">
            <li class="col-6">quantity</li>
            <li class="col-6">Needed Quantity</li>
          </ul>
          <ul class="grid grid-cols-2">
            <li class="col-6">runs (optional) </li>
            <li class="col-6">Runs to deliver </li>
          </ul>
          <ul class="grid grid-cols-2">
            <li class="col-6">interval (optional) </li>
            <li class="col-6">Interval in minutes </li>
          </ul>
          <ul class="grid grid-cols-2">
            <li class="col-6">Example Response</li>
            <li class="col-6"></li>
          </ul>
          <div class="code">
            <i onclick="copy(event)" id="copy" class="fa-solid fa-copy"></i>
            <span class="right-btns"></span>
            <p id="code">
              {
              "order": 23501
              }
            </p>
          </div>
        </div>
      </div>

    </div>

  </div>
  <!--order status-->
  <div class="container">
    <div class="row">
      <div class="table">
        <div class="code-part">
          <div class="taps">
            <section style="padding: 20px;background-color:#2e384c;" class=" tap2 activ">Order Status</section>
          </div>
          <ul id="Top-part" class="grid grid-cols-2">
            <li class="col-6">Parameters</li>
            <li class="col-6">DESCRIPTION</li>
          </ul>

          <ul class="grid grid-cols-2">
            <li class="col-6">key</li>
            <li class="col-6">Your API key</li>
          </ul>

          <ul class="grid grid-cols-2">
            <li class="col-6">action</li>
            <li class="col-6">status</li>
          </ul>
          <ul class="grid grid-cols-2">
            <li class="col-6">order</li>
            <li class="col-6">Order Id</li>
          </ul>
          <ul class="grid grid-cols-2">
            <li class="col-6">Example Response</li>
            <li class="col-6"></li>
          </ul>
          <div class="code">
            <i onclick="copy(event)" id="copy" class="fa-solid fa-copy"></i>
            <span class="right-btns"></span>
            <p id="code">
              {
              "charge": "0.27819",
              "start_count": "3572",
              "status": "Partial",
              "remains": "157",
              "currency": "USD"
              }

            </p>
          </div>
        </div>
      </div>

    </div>

  </div>
  <!--multiple orders status-->
  <div class="container">
    <div class="row">
      <div class="table">
        <div class="code-part">
          <div class="taps">
            <section style="padding: 20px;background-color:#2e384c;" class=" tap2 activ">Multiple Orders Status
            </section>
          </div>
          <ul id="Top-part" class="grid grid-cols-2">
            <li class="col-6">Parameters</li>
            <li class="col-6">DESCRIPTION</li>
          </ul>

          <ul class="grid grid-cols-2">
            <li class="col-6">key</li>
            <li class="col-6">Your API key</li>
          </ul>

          <ul class="grid grid-cols-2">
            <li class="col-6">action</li>
            <li class="col-6">status</li>
          </ul>
          <ul class="grid grid-cols-2">
            <li class="col-6">orders</li>
            <li class="col-6">Order IDs (separated by a comma, up to 100 IDs)</li>
          </ul>
          <ul class="grid grid-cols-2">
            <li class="col-6">Example Response</li>
            <li class="col-6"></li>
          </ul>
          <div class="code">
            <i onclick="copy(event)" id="copy" class="fa-solid fa-copy"></i>
            <span class="right-btns"></span>
            <p id="code">
              {
              "1": {
              "charge": "0.27819",
              "start_count": "3572",
              "status": "Partial",
              "remains": "157",
              "currency": "USD"
              },
              "10": {
              "error": "Incorrect order ID"
              },
              "100": {
              "charge": "1.44219",
              "start_count": "234",
              "status": "In progress",
              "remains": "10",
              "currency": "USD"
              }
              }

            </p>
          </div>
        </div>
      </div>

    </div>

  </div>
  <!--order status-->
  <div class="container">
    <div class="row">
      <div class="table">
        <div class="code-part">
          <div class="taps">
            <section style="padding: 20px;background-color:#2e384c;" class=" tap2 activ">User Balance</section>
          </div>
          <ul id="Top-part" class="grid grid-cols-2">
            <li class="col-6">Parameters</li>
            <li class="col-6">DESCRIPTION</li>
          </ul>

          <ul class="grid grid-cols-2">
            <li class="col-6">key</li>
            <li class="col-6">Your API key</li>
          </ul>

          <ul class="grid grid-cols-2">
            <li class="col-6">action</li>
            <li class="col-6">balance</li>
          </ul>
          <ul class="grid grid-cols-2">
            <li class="col-6">Example Response</li>
            <li class="col-6"></li>
          </ul>
          <div class="code">
            <i onclick="copy(event)" id="copy" class="fa-solid fa-copy"></i>
            <span class="right-btns"></span>
            <p id="code">
              {
              "balance": "100.84292",
              "currency": "USD"
              }

            </p>
          </div>
        </div>
      </div>

    </div>

  </div>
  <!--create refill-->
  <div class="container">
    <div class="row">
      <div class="table">
        <div class="code-part">
          <div class="taps">
            <section style="padding: 20px;background-color:#2e384c;" class=" tap2 activ">Create refill</section>
          </div>
          <ul id="Top-part" class="grid grid-cols-2">
            <li class="col-6">Parameters</li>
            <li class="col-6">DESCRIPTION</li>
          </ul>

          <ul class="grid grid-cols-2">
            <li class="col-6">key</li>
            <li class="col-6">Your API key</li>
          </ul>

          <ul class="grid grid-cols-2">
            <li class="col-6">action</li>
            <li class="col-6">refill</li>
          </ul>
          <ul class="grid grid-cols-2">
            <li class="col-6">order</li>
            <li class="col-6">Order Id</li>
          </ul>
          <ul class="grid grid-cols-2">
            <li class="col-6">Example Response</li>
            <li class="col-6"></li>
          </ul>
          <div class="code">
            <i onclick="copy(event)" id="copy" class="fa-solid fa-copy"></i>
            <span class="right-btns"></span>
            <p id="code">
              {
              "refill": "1"
              }

            </p>
          </div>
        </div>
      </div>

    </div>

  </div>
  <!--create multiple refill-->
  <div class="container">
    <div class="row">
      <div class="table">
        <div class="code-part">
          <div class="taps">
            <section style="padding: 20px;background-color:#2e384c;" class=" tap2 activ">Create multiple refill
            </section>
          </div>
          <ul id="Top-part" class="grid grid-cols-2">
            <li class="col-6">Parameters</li>
            <li class="col-6">DESCRIPTION</li>
          </ul>

          <ul class="grid grid-cols-2">
            <li class="col-6">key</li>
            <li class="col-6">Your API key</li>
          </ul>

          <ul class="grid grid-cols-2">
            <li class="col-6">action</li>
            <li class="col-6">refill</li>
          </ul>
          <ul class="grid grid-cols-2">
            <li class="col-6">orders</li>
            <li class="col-6"> Order IDs (separated by a comma, up to 100 IDs)</li>
          </ul>
          <ul class="grid grid-cols-2">
            <li class="col-6">Example Response</li>
            <li class="col-6"></li>
          </ul>
          <div class="code">
            <i onclick="copy(event)" id="copy" class="fa-solid fa-copy"></i>
            <span class="right-btns"></span>
            <p id="code">
              [
              {
              "order": 1,
              "refill": 1
              },
              {
              "order": 2,
              "refill": 2
              },
              {
              "order": 3,
              "refill": {
              "error": "Incorrect order ID"
              }
              }
              ]

            </p>
          </div>
        </div>
      </div>

    </div>

  </div>
  <!--get refill status-->
  <div class="container">
    <div class="row">
      <div class="table">
        <div class="code-part">
          <div class="taps">
            <section style="padding: 20px;background-color:#2e384c;" class=" tap2 activ">Get refill status</section>
          </div>
          <ul id="Top-part" class="grid grid-cols-2">
            <li class="col-6">Parameters</li>
            <li class="col-6">DESCRIPTION</li>
          </ul>

          <ul class="grid grid-cols-2">
            <li class="col-6">key</li>
            <li class="col-6">Your API key</li>
          </ul>

          <ul class="grid grid-cols-2">
            <li class="col-6">action</li>
            <li class="col-6">refill_status</li>
          </ul>
          <ul class="grid grid-cols-2">
            <li class="col-6">refill</li>
            <li class="col-6">Refill Id</li>
          </ul>
          <ul class="grid grid-cols-2">
            <li class="col-6">Example Response</li>
            <li class="col-6"></li>
          </ul>
          <div class="code">
            <i onclick="copy(event)" id="copy" class="fa-solid fa-copy"></i>
            <span class="right-btns"></span>
            <p id="code">
              {
                "status": "Completed"
             }

            </p>
          </div>
        </div>
      </div>

    </div>

  </div>
  <!--get multiple refill status-->
  <div class="container">
    <div class="row">
      <div class="table">
        <div class="code-part">
          <div class="taps">
            <section style="padding: 20px;background-color:#2e384c;" class=" tap2 activ">Get multiple refill status</section>
          </div>
          <ul id="Top-part" class="grid grid-cols-2">
            <li class="col-6">Parameters</li>
            <li class="col-6">DESCRIPTION</li>
          </ul>

          <ul class="grid grid-cols-2">
            <li class="col-6">key</li>
            <li class="col-6">Your API key</li>
          </ul>

          <ul class="grid grid-cols-2">
            <li class="col-6">action</li>
            <li class="col-6">refill_status</li>
          </ul>
          <ul class="grid grid-cols-2">
            <li class="col-6">refills</li>
            <li class="col-6">Refill IDs (separated by a comma, up to 100 IDs)</li>
          </ul>
          <ul class="grid grid-cols-2">
            <li class="col-6">Example Response</li>
            <li class="col-6"></li>
          </ul>
          <div class="code">
            <i onclick="copy(event)" id="copy" class="fa-solid fa-copy"></i>
            <span class="right-btns"></span>
            <p id="code">
              [
                {
                    "refill": 1,
                    "status": "Completed"
                },
                {
                    "refill": 2,
                    "status": "Rejected"
                },
                {
                    "refill": 3,
                    "status": {
                        "error": "Refill not found"
                    }
                }
            ]
            </p>
          </div>
        </div>
      </div>

    </div>

  </div>
</div>
@endsection
@section('scripts')
<script>
  function copy(event) {
      // Find the parent div of the clicked icon
      var parentDiv = event.target.closest('.code');
      if (!parentDiv) return; // Return if no parent div is found

      // Find the <p> element within the parent div
      var jsonElement = parentDiv.querySelector('p');
      if (!jsonElement) return; // Return if no <p> element is found

      // Get the JSON data
      var jsonData = jsonElement.textContent.trim();

      // Create a temporary textarea to copy the JSON data
      var tempTextArea = document.createElement('textarea');
      tempTextArea.value = jsonData;
      document.body.appendChild(tempTextArea);

      // Select and copy the JSON data to the clipboard
      tempTextArea.select();
      document.execCommand('copy');

      // Remove the temporary textarea
      document.body.removeChild(tempTextArea);
      alert('Copied Successfully');
  }
</script>
@endsection