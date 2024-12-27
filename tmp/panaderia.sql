-- Tabla Cliente
CREATE TABLE Cliente (
                         idCliente INT PRIMARY KEY AUTO_INCREMENT,
                         nombre VARCHAR(255) NOT NULL,
                         apellido VARCHAR(255) NOT NULL,
                         telefono VARCHAR(20),
                         correo VARCHAR(255)
);

-- Tabla Vendedor
CREATE TABLE Vendedor (
                          idVendedor INT PRIMARY KEY AUTO_INCREMENT,
                          nombre VARCHAR(255) NOT NULL,
                          telefono VARCHAR(20)
);

-- Tabla Producto
CREATE TABLE Producto (
                          idProducto INT PRIMARY KEY AUTO_INCREMENT,
                          nombre VARCHAR(255) NOT NULL,
                          imagen VARCHAR(255),
                          precio DECIMAL(10, 2) NOT NULL,
                          tipo ENUM('por kilo', 'por unidad') NOT NULL
);

-- Tabla Venta
CREATE TABLE Venta (
                       idVenta INT PRIMARY KEY AUTO_INCREMENT,
                       idCliente INT NOT NULL,
                       idVendedor INT NOT NULL,
                       fechaVenta DATE NOT NULL,
                       fechaEntrega DATE,
                       tipoVenta ENUM('contado', 'credito') NOT NULL,
                       comentario VARCHAR(70),
                       FOREIGN KEY (idCliente) REFERENCES Cliente(idCliente),
                       FOREIGN KEY (idVendedor) REFERENCES Vendedor(idVendedor)
);

-- Tabla DetalleVenta
CREATE TABLE DetalleVenta (
                              idDetalleVenta INT PRIMARY KEY AUTO_INCREMENT,
                              idVenta INT NOT NULL,
                              idProducto INT NOT NULL,
                              cantidad DECIMAL(10, 2) NOT NULL,
                              subtotal DECIMAL(10, 2) NOT NULL,
                              FOREIGN KEY (idVenta) REFERENCES Venta(idVenta),
                              FOREIGN KEY (idProducto) REFERENCES Producto(idProducto)
);

-- Tabla Pedido
CREATE TABLE Pedido (
                        idPedido INT PRIMARY KEY AUTO_INCREMENT,
                        idCliente INT NOT NULL,
                        idVendedor INT NOT NULL,
                        fechaRealizado DATE NOT NULL,
                        fechaEntrega DATE,
                        tipoPedido ENUM('contado', 'credito') NOT NULL,
                        comentario VARCHAR(70),
                        entregado BOOLEAN NOT NULL DEFAULT FALSE, -- Valor por defecto: no entregado
                        FOREIGN KEY (idCliente) REFERENCES Cliente(idCliente),
                        FOREIGN KEY (idVendedor) REFERENCES Vendedor(idVendedor)
);

-- Tabla DetallePedido
CREATE TABLE DetallePedido (
                               idDetallePedido INT PRIMARY KEY AUTO_INCREMENT,
                               idPedido INT NOT NULL,
                               idProducto INT NOT NULL,
                               cantidad DECIMAL(10, 2) NOT NULL,
                               subtotal DECIMAL(10, 2) NOT NULL,
                               FOREIGN KEY (idPedido) REFERENCES Pedido(idPedido),
                               FOREIGN KEY (idProducto) REFERENCES Producto(idProducto)
);