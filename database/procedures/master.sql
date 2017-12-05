
CREATE VIEW minimumPriceView AS SELECT prod_name FROM products WHERE prod_cost > 1.00;



CREATE VIEW CoinsPerUser AS
  SELECT
    *
  FROM
    collection
  GROUP by orderNumber
  ORDER BY total DESC;