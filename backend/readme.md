# Base de datos

``` MYSQL
-- Tabla Cliente
CREATE TABLE Clientes (
    idCliente INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    telefono VARCHAR(20),
    correo VARCHAR(255)
);

-- Tabla Vendedor
CREATE TABLE Vendedores (
    idVendedor INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    telefono VARCHAR(20)
);

-- Tabla Producto
CREATE TABLE Productos (
    idProducto INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    imagen VARCHAR(255),
    precio DECIMAL(10, 2) NOT NULL,
    tipo ENUM('por kilo', 'por unidad') NOT NULL
);

-- Tabla Venta
CREATE TABLE Ventas (
    idVenta INT PRIMARY KEY AUTO_INCREMENT,
    idCliente INT NOT NULL,
    idVendedor INT NOT NULL,
    fechaVenta DATE NOT NULL,
    fechaEntrega DATE,
    tipoVenta ENUM('contado', 'credito') NOT NULL,
    comentario VARCHAR(70),
    FOREIGN KEY (idCliente) REFERENCES Clientes(idCliente),
    FOREIGN KEY (idVendedor) REFERENCES Vendedores(idVendedor)
);

-- Tabla DetalleVentas
CREATE TABLE DetalleVentas (
    idDetalleVenta INT PRIMARY KEY AUTO_INCREMENT,
    idVenta INT NOT NULL,
    idProducto INT NOT NULL,
    cantidad DECIMAL(10, 2) NOT NULL,
    subtotal DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (idVenta) REFERENCES Ventas(idVenta),
    FOREIGN KEY (idProducto) REFERENCES Productos(idProducto)
);

-- Tabla Pedidos
CREATE TABLE Pedidos (
    idPedido INT PRIMARY KEY AUTO_INCREMENT,
    idCliente INT NOT NULL,
    idVendedor INT NOT NULL,
    fechaRealizado DATE NOT NULL,
    fechaEntrega DATE,
    tipoPedido ENUM('contado', 'credito') NOT NULL,
    comentario VARCHAR(70),
    entregado BOOLEAN NOT NULL DEFAULT FALSE, -- Valor por defecto: no entregado
    FOREIGN KEY (idCliente) REFERENCES Clientes(idCliente),
    FOREIGN KEY (idVendedor) REFERENCES Vendedores(idVendedor)
);

-- Tabla DetallePedidos
CREATE TABLE DetallePedidos (
    idDetallePedido INT PRIMARY KEY AUTO_INCREMENT,
    idPedido INT NOT NULL,
    idProducto INT NOT NULL,
    cantidad DECIMAL(10, 2) NOT NULL,
    subtotal DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (idPedido) REFERENCES Pedidos(idPedido),
    FOREIGN KEY (idProducto) REFERENCES Productos(idProducto)
);
```
# END POINTS

## Cliente
- CREATE: POST /cliente
  - url: http://localhost/backend/api-rest/create_cliente.php
    - form-data: nombre, apellido, telefono, correo
    - response: {message: "Cliente creado"}
      - status: 201
    - error: {message: "Cliente no creado"}
      - status: 503
- READ: GET /cliente
- DELETE: DELETE /cliente/:id
- UPDATE: PUT /cliente/:id