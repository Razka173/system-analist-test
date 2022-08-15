{
	"info": {
		"_postman_id": "90c5e1b5-6da4-4971-a2c3-63e00b63a2ea",
		"name": "System Analist Tes",
		"schema": "https://schema.getpostman.com/json/collection/v2.1.0/collection.json",
		"_exporter_id": "13713549"
	},
	"item": [
		{
			"name": "Get List Invoice",
			"request": {
				"method": "GET",
				"header": [],
				"url": {
					"raw": "system-analyst.test/api/v1/invoices",
					"host": [
						"system-analyst",
						"test"
					],
					"path": [
						"api",
						"v1",
						"invoices"
					]
				}
			},
			"response": []
		},
		{
			"name": "Get Invoice by ID",
			"request": {
				"method": "GET",
				"header": [],
				"url": {
					"raw": "system-analyst.test/api/v1/invoices/1",
					"host": [
						"system-analyst",
						"test"
					],
					"path": [
						"api",
						"v1",
						"invoices",
						"1"
					]
				}
			},
			"response": []
		},
		{
			"name": "Create Invoice Data",
			"request": {
				"method": "POST",
				"header": [],
				"body": {
					"mode": "formdata",
					"formdata": [
						{
							"key": "invoice_no",
							"value": "1ABC",
							"type": "text"
						},
						{
							"key": "date",
							"value": "2022/01/01",
							"type": "text"
						},
						{
							"key": "customer_name",
							"value": "John Due",
							"type": "text"
						},
						{
							"key": "salesperson_name",
							"value": "Gilbert",
							"type": "text"
						},
						{
							"key": "payment_type",
							"value": "CASH",
							"type": "text"
						},
						{
							"key": "product_id",
							"value": "1",
							"type": "text"
						}
					]
				},
				"url": {
					"raw": "system-analyst.test/api/v1/invoices/store",
					"host": [
						"system-analyst",
						"test"
					],
					"path": [
						"api",
						"v1",
						"invoices",
						"store"
					]
				}
			},
			"response": []
		},
		{
			"name": "Update Invoice Data",
			"request": {
				"method": "POST",
				"header": [],
				"body": {
					"mode": "formdata",
					"formdata": [
						{
							"key": "id",
							"value": "1",
							"type": "text"
						},
						{
							"key": "invoice_no",
							"value": "1ABC",
							"type": "text"
						},
						{
							"key": "date",
							"value": "2022/01/01",
							"type": "text"
						},
						{
							"key": "customer_name",
							"value": "John Due",
							"type": "text"
						},
						{
							"key": "salesperson_name",
							"value": "Gilbert",
							"type": "text"
						},
						{
							"key": "payment_type",
							"value": "CASH",
							"type": "text"
						},
						{
							"key": "product_id",
							"value": "1",
							"type": "text"
						}
					]
				},
				"url": {
					"raw": "system-analyst.test/api/v1/invoices/update",
					"host": [
						"system-analyst",
						"test"
					],
					"path": [
						"api",
						"v1",
						"invoices",
						"update"
					]
				}
			},
			"response": []
		},
		{
			"name": "Delete Invoice Data",
			"request": {
				"method": "DELETE",
				"header": [],
				"body": {
					"mode": "formdata",
					"formdata": [
						{
							"key": "id",
							"value": "1",
							"type": "text"
						},
						{
							"key": "invoice_no",
							"value": "1ABC",
							"type": "text"
						},
						{
							"key": "date",
							"value": "2022/01/01",
							"type": "text"
						},
						{
							"key": "customer_name",
							"value": "John Due",
							"type": "text"
						},
						{
							"key": "salesperson_name",
							"value": "Gilbert",
							"type": "text"
						},
						{
							"key": "payment_type",
							"value": "CASH",
							"type": "text"
						},
						{
							"key": "product_id",
							"value": "1",
							"type": "text"
						}
					]
				},
				"url": {
					"raw": "system-analyst.test/api/v1/invoices/delete/1",
					"host": [
						"system-analyst",
						"test"
					],
					"path": [
						"api",
						"v1",
						"invoices",
						"delete",
						"1"
					]
				}
			},
			"response": []
		},
		{
			"name": "Get List Product",
			"request": {
				"method": "GET",
				"header": [],
				"url": {
					"raw": "system-analyst.test/api/v1/products",
					"host": [
						"system-analyst",
						"test"
					],
					"path": [
						"api",
						"v1",
						"products"
					]
				}
			},
			"response": []
		},
		{
			"name": "Get Product by ID",
			"request": {
				"method": "GET",
				"header": [],
				"url": {
					"raw": "system-analyst.test/api/v1/products/1",
					"host": [
						"system-analyst",
						"test"
					],
					"path": [
						"api",
						"v1",
						"products",
						"1"
					]
				}
			},
			"response": []
		},
		{
			"name": "Create Product Data",
			"request": {
				"method": "POST",
				"header": [],
				"body": {
					"mode": "formdata",
					"formdata": [
						{
							"key": "item_name",
							"value": "Tas Mewah",
							"type": "text"
						},
						{
							"key": "quantity",
							"value": "10",
							"type": "text"
						},
						{
							"key": "total_cost_of_goods_sold",
							"value": "200",
							"type": "text"
						},
						{
							"key": "total_price_sold",
							"value": "2000",
							"type": "text"
						}
					]
				},
				"url": {
					"raw": "system-analyst.test/api/v1/products/store",
					"host": [
						"system-analyst",
						"test"
					],
					"path": [
						"api",
						"v1",
						"products",
						"store"
					]
				}
			},
			"response": []
		},
		{
			"name": "Update Product Data",
			"request": {
				"method": "POST",
				"header": [],
				"body": {
					"mode": "formdata",
					"formdata": [
						{
							"key": "id",
							"value": "1",
							"type": "text"
						},
						{
							"key": "item_name",
							"value": "Tas Mewah",
							"type": "text"
						},
						{
							"key": "quantity",
							"value": "10",
							"type": "text"
						},
						{
							"key": "total_cost_of_goods_sold",
							"value": "200",
							"type": "text"
						},
						{
							"key": "total_price_sold",
							"value": "2000",
							"type": "text"
						}
					]
				},
				"url": {
					"raw": "system-analyst.test/api/v1/products/update",
					"host": [
						"system-analyst",
						"test"
					],
					"path": [
						"api",
						"v1",
						"products",
						"update"
					]
				}
			},
			"response": []
		},
		{
			"name": "Delete Product Data",
			"request": {
				"method": "DELETE",
				"header": [],
				"body": {
					"mode": "formdata",
					"formdata": [
						{
							"key": "id",
							"value": "1",
							"type": "text"
						},
						{
							"key": "invoice_no",
							"value": "1ABC",
							"type": "text"
						},
						{
							"key": "date",
							"value": "2022/01/01",
							"type": "text"
						},
						{
							"key": "customer_name",
							"value": "John Due",
							"type": "text"
						},
						{
							"key": "salesperson_name",
							"value": "Gilbert",
							"type": "text"
						},
						{
							"key": "payment_type",
							"value": "CASH",
							"type": "text"
						},
						{
							"key": "product_id",
							"value": "1",
							"type": "text"
						}
					]
				},
				"url": {
					"raw": "system-analyst.test/api/v1/products/delete/1",
					"host": [
						"system-analyst",
						"test"
					],
					"path": [
						"api",
						"v1",
						"products",
						"delete",
						"1"
					]
				}
			},
			"response": []
		}
	]
}