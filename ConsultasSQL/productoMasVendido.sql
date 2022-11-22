SELECT nombre_producto AS Producto, COUNT( id_producto_vendido ) AS total 
FROM sell 
GROUP BY id_producto_vendido 
ORDER BY total DESC 
LIMIT 1;