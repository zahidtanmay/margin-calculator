# margin-calculator
Margin profit calculator calculates the accumulated total profit from the given sequences of purchases and sales.


#### Installation

After downloading project, navigate to project directory
    
    cd /margin-calculator
    
Then install composer by

    composer install
    
Provide your database connection inside  `.env` file (.env.example file provided)

    DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name"
    
Then run 
       
       php bin/console doctrine:database:create
       php bin/console make:migration
       
You are ready to go.

#### Usage

When you browse your homepage directory, there will be two buttons `Add` and `Calculate Profit`.

Click on `Add` button will add a row of two inputs `Quantity` and `Price`, and two action button `Buy` or `Sell`.
You can add any sequence of `Buy` or `Sell` operation.

`Calculate Profit` will give you the output of total margin profit upon your given data.

#### Methodology
For this project tow database tables are used.
- `transaction` table used for each `Buy` and `Sell`.
- `stock` table used for each buy entry and keep track of the items calculating profit for each `Sell`.

- For each sell it fetched the first row of `stock` and compares with stock quantity and calculates profit.
    * If stock quantity is less than current sell quantity it deletes the row and fetch next row.
    * Else it updates the current row with adjusted quantity.

- Total margin profit is retrieved by the sum of profit column of `transaction` table.

#### Benchmark Report
(Used Homestead vagrant box with CPUS - 1 & Memory - 2048 MB)
```
Benchmarking margin-calculator.test (be patient).....done


Server Software:        nginx/1.15.8
Server Hostname:        margin-calculator.test
Server Port:            80

Document Path:          /api/transaction
Document Length:        273 bytes

Concurrency Level:      10
Time taken for tests:   39.879 seconds
Complete requests:      100
Failed requests:        0
Total transferred:      58800 bytes
HTML transferred:       27300 bytes
Requests per second:    2.51 [#/sec] (mean)
Time per request:       3987.884 [ms] (mean)
Time per request:       398.788 [ms] (mean, across all concurrent requests)
Transfer rate:          1.44 [Kbytes/sec] received

Connection Times (ms)
              min  mean[+/-sd] median   max
Connect:        0    0   0.1      0       0
Processing:  2220 3860 390.7   3909    5526
Waiting:     2220 3860 390.7   3909    5526
Total:       2221 3860 390.6   3909    5526

Percentage of the requests served within a certain time (ms)
  50%   3909
  66%   3926
  75%   3937
  80%   3942
  90%   3978
  95%   4161
  98%   4259
  99%   5526
 100%   5526 (longest request)
```
