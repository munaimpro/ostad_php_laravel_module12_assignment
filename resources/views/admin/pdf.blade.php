<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

        <header>
          <div class="headerSection">
            <div class="logoAndName">
              <svg>
                <circle cx="50%" cy="50%" r="40%" stroke="black" stroke-width="3" fill="black" />
              </svg>
              <h1>Green Line Paribahan</h1>
            </div>
            <div>
              <h2>Scania First Class</h2>
              <h2 class="bg-stone-900">{{$ticket_sales->from}}</h2>
              <p>
                <b>Trip Name</b> #{{$ticket_sales->id}}
              </p>
              <p>
                <b>Coach No</b> #{{$ticket_sales->bus_id}}
              </p>
              <p>
                <b>Date:</b> {{$ticket_sales->doj}}
              </p>
              <p>
                <b>Leaving From:</b> {{$ticket_sales->from}}
              </p>
              <p>
                <b>Going To:</b> {{$ticket_sales->to}}
              </p>
              <p>
                <b>Total Seat:</b> {{$ticket_sales->seat}}
              </p>
            </div>
          </div>
          <hr />
          <div class="headerSection">
            <div class="billTo">
              <h3>Bill to</h3>
              <p>
                <b>Customer Name</b>
                <br />
                123 Elephent Road, Suite 01
                <br />
                Uttora, Dhaka 9000
                <br />
                <a href="mailto:clientname@clientwebsite.com">
                  clientname@clientwebsite.com
                </a>
                <br />
                317.123.8765
              </p>
            </div>
          </div>
        </header>
        
        <footer>
            <a href="https://companywebsite.com">
              companywebsite.com
            </a>
            <a href="mailto:company@website.com">
              company@website.com
            </a>
            <span>
              317.123.8765
            </span>
            <span>
              123 Sony Road, Mirpur 01, Janato House, Dhaka 9000
            </span>
        </footer>
        
        <main>
          <table>
            <thead>
              <tr>
                <th>Item Description</th>
                <th>Qty</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <b>Item Names Goes Here</b>
                  <br />PRS340011-DH</td>
                <td>2</td>
              </tr>
              <tr>
                <td>
                  <b>Lorem Ipsum</b>
                  <br />
                  PRS367240-DH</td>
                <td>1</td>
              </tr>
            </tbody>
          </table>
          <div class="notes">
            <b>Notes</b>
            <p>Gift wrap items</p>
          </div>
        </main>
        <aside>
          <hr />
          <b>Thanks for your business!</b>
          <p>If you have any questions please contact us at <a href="mailto:help@company.com">help@company.com</a></p>
        </aside>
    
</body>
</html>