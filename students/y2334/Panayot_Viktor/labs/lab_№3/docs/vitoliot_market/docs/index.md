# Welcome to vitoliot_market
Enjoy the doc!
## __Firm__
|Column               |Type           |PK   |
|---------------------|---------------|:---:|
| idfirm              | integer       |True |
| name_firm           | character(25) |False|
| specialization_firm | character(25) |False|

### __Indexes__:
    "firm_pkey" PRIMARY KEY, btree (idfirm)

### __References__:
    TABLE "contract_fp" CONSTRAINT "contract_fp_iffirm_fkey" FOREIGN KEY (idfirm) REFERENCES firm(idfirm) ON DELETE CASCADE
## __Product__
|Column              |Type           |PK   |
|--------------------|---------------|:---:|
| idproduct          | integeTr       |True |
| name_product       | character(25) |False|
| shelf_life         | date          |False|
| unit               | character(10) |False|
| price              | integer       |False|
| date_of_production | date          |False|
| date_of_shipment   | date          |False|

### __Indexes__:
    "product_pkey" PRIMARY KEY, btree (ifproduct)

### __References__:
    TABLE "batch_content" CONSTRAINT "batch_content_idproduct_fkey" FOREIGN KEY (idproduct) REFERENCES product(ifproduct) ON DELETE CASCADE
    TABLE "contract_fp" CONSTRAINT "contract_fp_idproduct_fkey" FOREIGN KEY (idproduct) REFERENCES product(ifproduct) ON DELETE CASCADE

## Contract_FP
|Column              |Type           |PK   |
|--------------------|---------------|:---:|
 idproduct        | integer |True
 idfirm           | integer |False
 date_of_contract | date    |False

### __Constraints__:
    "contract_fp_idproduct_fkey" FOREIGN KEY (idproduct) REFERENCES product(ifproduct) ON DELETE CASCADE
    "contract_fp_iffirm_fkey" FOREIGN KEY (idfirm) REFERENCES firm(idfirm) ON DELETE CASCADE
## Batch
|Column              |Type           |PK   |
|--------------------|---------------|:---:|
 idbatch           | integer       |True                    
 name_batch        | character(10) |False
 amount_of_product | text          |False
 price_batch       | integer       |False

### __Indexes__:
    "batch_pkey" PRIMARY KEY, btree (idbatch)

### __References__:
    TABLE "batch_content" CONSTRAINT "batch_content_idbatch_fkey" FOREIGN KEY (idbatch) REFERENCES batch(idbatch) ON DELETE CASCADE
    TABLE "contract_bcb" CONSTRAINT "contract_bcb_idbatch_fkey" FOREIGN KEY (idbatch) REFERENCES batch(idbatch) ON DELETE CASCADE
## Batch content
|Column              |Type           |PK   |
|--------------------|---------------|:---:|
 idbatch         | integer |True
 idproduct       | integer |True
 date_of_receipt | date    |False

### __Constraints__:
    "batch_content_idbatch_fkey" FOREIGN KEY (idbatch) REFERENCES batch(idbatch) ON DELETE CASCADE
    "batch_content_idproduct_fkey" FOREIGN KEY (idproduct) REFERENCES product(ifproduct) ON DELETE CASCADE
## Office
|Column              |Type           |PK   |
|--------------------|---------------|:---:|
 idoffice    | integer       |True                 
 name_office | character(25) |Fakse

### __Indexes__:
    "office_pkey" PRIMARY KEY, btree (idoffice)

### __References__:
    TABLE "contract_bo" CONSTRAINT "contract_bo_idoffice_fkey" FOREIGN KEY (idoffice) REFERENCES office(idoffice) ON DELETE CASCADE
## Broker
|Column              |Type           |PK   |
|--------------------|---------------|:---:|
 idbroker         | integer       | True                   
 name_broker      | character(30) | False
 succsess_percent | integer       | False
 work_experience  | integer       | False

### __Indexes__:
    "broker_pkey" PRIMARY KEY, btree (idbroker)

### __References__:
    TABLE "contract_bcb" CONSTRAINT "contract_bcb_idbroker_fkey" FOREIGN KEY (idbroker) REFERENCES broker(idbroker) ON DELETE CASCADE
    TABLE "contract_bo" CONSTRAINT "contract_bo_idbroker_fkey" FOREIGN KEY (idbroker) REFERENCES broker(idbroker) ON DELETE CASCADE
## Contract_BO
|Column              |Type           |PK   |
|--------------------|---------------|:---:|
 idcontract_bo    | integer | True        
 idoffice         | integer | True
 idbroker         | integer | True
 office_percent   | integer | False
 salary           | integer | False
 date_of_duration | date    | False

### __Indexes__:
    "contract_bo_pkey" PRIMARY KEY, btree (idcontract_bo)

### __Constraints__:
    "contract_bo_idbroker_fkey" FOREIGN KEY (idbroker) REFERENCES broker(idbroker) ON DELETE CASCADE
    "contract_bo_idoffice_fkey" FOREIGN KEY (idoffice) REFERENCES office(idoffice) ON DELETE CASCADE
## Customer
|Column              |Type           |PK   |
|--------------------|---------------|:---:|
 idcustomer    | integer       |True                 
 name_customer | character(30) |False

### __Indexes__:
    "customer_pkey" PRIMARY KEY, btree (idcustomer)

### __References__:
    TABLE "contract_bcb" CONSTRAINT "contract_bcb_idcustomer_fkey" FOREIGN KEY (idcustomer) REFERENCES customer(idcustomer) ON DELETE CASCADE
## __Contract_BCB__
|Column              |Type           |PK   |
|--------------------|---------------|:---:|
 idbroker           | integer |True
 idcustomer         | integer |True
 idbatch            | integer |True
 date_of_conclusion | date    |False

### __Constraints__:
    "contract_bcb_idbatch_fkey" FOREIGN KEY (idbatch) REFERENCES batch(idbatch) ON DELETE CASCADE
    "contract_bcb_idbroker_fkey" FOREIGN KEY (idbroker) REFERENCES broker(idbroker) ON DELETE CASCADE
    "contract_bcb_idcustomer_fkey" FOREIGN KEY (idcustomer) REFERENCES customer(idcustomer) ON DELETE CASCADE