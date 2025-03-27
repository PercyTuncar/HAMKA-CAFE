# RAVEHUB

Crea la plataforma para ravehub. 
importante leer todo e implementar todo lo solicitado:

## Flujos principales de la plataforma

### MENU DE LA PLATAFORMA:
- RaveHub Logo
- Eventos (Público)
- Tienda (Público)
- Blog (Público)
- Nosotros (Público)
- Contacto (Público)
- Bandera del pais y simbolo de la divisa, si el usuario no configura su moneda esto se debe detectar automaticamente desde el sistema de acuerdo a la ubiacacion del usuario, si el usuario es logueado se debe mostrar la divisa de acuerdo a su configuración en su perfil pero tambien podra selccionar otras divisas ya que será una lista en el navbar con todas las divisas disponibles. si el usuario no esta logueado se debe obtener su ubicacion(sin pedir permiso) y se debe configuarar su divisa de acuerdo a su pais detectado y si no se detecta conexito se debe mostrar en dolares y se debe guardar en localstorage. si el usuario selecciona una divisa diferente entonces se debe hacer el tipo de cambio atomaticamnete en la pagina de eventos y productos para que el usuario sepa los precios en su tipo de mondeda elegida.

- Iniciar sesión
- Si el usuario ya inicio sesion se debe mostrar su avatar y mas opciones para administrar sus pedidos y entradas compradas.
#### MENU con opciones adicionales para usuarios logueados con rol user
- Perfil
- Mis entradas
- Mis pagos
- Mis compras
- Ajustes
 #### MENU con opciones adicionales para usuarios logueados con rol admin todas las opciones de administracion deben estar dentro de /admin
- Dashboard
- Perfil
- Ajustes

### 1. Sistema de registro y geolocalización
- Al registrarse, el usuario debe ingresar su nombre, apellido,  seleccionar su país de residencia (se mostrará una lista con todos los paises de latinoamerica y si es fuera de latinoamerica debe aparecer un icono de mundo), numero de telefono con prefijo de pais por defecto, Documento de identidad (DNI, Cedula, Rut, etc), contraseña, correo. 
- Importante: El sistema automáticamente:
  - Asigna el prefijo (+51, +56, etc) telefónico correspondiente al país 
  - Configura automaticamenteel tipo de moneda segun el pais seleccionado y si es furea de latam debe ser el dolar.
- Para usuarios no autenticados, la plataforma detecta automáticamente su ubicación (sin pedir permiso) para mostrar la moneda correspondiente en los precios de las entradas y/o productos. (este se mostrará en el navbar en una lista, ejemplo: 1 Peru PEN s/, 2 Chile CLP $, etc )

### 2. Exploración y compra de entradas
Primero el usuario ingresa a /eventos busca el evento al que esta interesado le da clic y y se abre los detalles del evento en /eventos/slug/page despues elige la zona en la que desea comprar se abre un modal donde podrá seleccionar la cantidad de entradas , si es pago completo o en cuotas, la modalidad de pago si es online o offline si selecciona offline obligatoriamente debe adjuntar la imagem del comporbate de pago y se debe generar una solicitud de compra pendiente de aprobacion en su perfil, por otra parte el administrador ingresa al dashboard donte tendrá la opcion para administrar los pagos offline ya sea en cuotas y al contado, entonces el administrador ingresa para aprobar o rechazar el comporbante, entonces:
    - si el administrador aprueba la solicitud de la compra (para aprobar o rechazar el administrador en su interfaz podrá ver todos los detalles del ticket comprado incluyendo el comporbante de pago) y es pago al contado (pago completo) el administrador podrá selecionar la fecha de descarga del ticket que estará disponible y a la vez tambien podrá subir el ticket en PDF Y por el lado del cliente COMO la entrada YA ESTA TODO PAGADO  el ticket se debe MOSTRAR al perfil del cliente en una seccion donde muestre las entradas aprobadas y completamente pagadas junto a la fecha que estara disponible la descarga asignada por el administrador, unsa vesz llegada la fecha se debe habilitar la descarga del ticket (pdf) subido por el administrador.

    - Si el administrador aprueba la solicitud de compra y el pago es en cuotas entoces atuomaticamente la primera cueota debe marcarse como pagada ya que para aprobar el ticket el administrador ptiene que revisar el comporbate adjunto que será de la priemra cuota y toda la informacion debe ser mostrada en una seccion para que el administrador pueda administrar las compras en cuotas de un usuario. y por el lado del usuario se debe motrar en su perfil el ticket como aprobado y la primera cuota como pagado ya que ésta esta vinculada al ticket que acaba aprobar el admin, ademas se deberá mostrar sus proximas fechas de pago y y los motos respectivos junto a un boton "pagar cuota" para que el clienta pueda ir pagando de esta forma todoas las cuotas, para pagar las siguientes cuotas el usuario debe darle clic en la cuota que desea pagar y se debe pedir obligatoriamente el comporbante de pago y se debe enviar al administrador para la aprobacion del pago de la segunda cuota de un tikcet.El administrador recible la solicitud de pago de la segunda cuota y puede aprobar o rechazar hasta que el usuario termine pagar todas sus cuotas . Cuando el usuario termine pagar todas sus cuotas podrá ver la fecha en la que estará disponible la descarga del ticket y una vez que llega esa fecha el el usuario podra descargar su ticket PDF asignado por el administrador.

    - Si el cliente seleciona que quiere más de una compra offline: En este caso se debe sumar los precios automaticamente y se debe generar una sola transaccion, por ejempo: El cliente selcciona que quiere comprar 2 entradas de manera offline ya sea en coutas o al contado, imaginemos que es en cuotas entonces selecciona el numero de cuotas, el medio de pago ya sea yape o plin o transferencia y sube su comprobante de pago, el comprobate se envia de manera exitosa al administrador el administrador lo revisa y lo aprueba y automaticamente se marca la primera cuota como pagado ya que para aprobar se necesita la primera cuota del pago y el administrador tambien ya asignar una fecha de descarga del ticket y tambien podrá subir dos tickets en PDF ya que son dos entradas estas se deben mostarr de manera individual dentro de una sola transaccion, entonce se genera una sola transaccion por las dos entradas y una vez que el usuario termine pagar todas sus cuotas de manera exitosa, automaticamente se mustran las 2 entradas por separadas y cada una con su fecha de descarga y cuando ya llegue la fecha de descarga se podra descargar cada entrada de manera separada pero que fue comprado dentro de una sola transaccion. y si es al contado entonces el admin deberá aprobar el ticket y asignar la fecha de descarga y subir los dos tickets en pdf para que se muestre al usuario tambien por separado cada ticket con su respectivo PDF pero todo esto fue dentro de una sola transaccion. 

    - Si la entrad es cuotas y se acerca la fecha de pago: se debe mostrar una advertencia que debe pagar la entrada o el precio subirá a tarifa regualar a la fecha actual y si no paga dos cuotas su entrada queda anulada. 

    - si un cliente envia un comprobante de pago no valido el administrador tiene el derecho a rechazar y la solicitud será eliminada.

    - Los pagos en linea aun no deben ser implementados, solo muestra un boton "Pagar online" deshabilitado y un mensaje proximamente. 

####  Asignación manual de tickets
- Asignación manual de tickets a usuarios (cortesía o venta)
- el admin tambien podrá asignar tickets a los usuarios y para esto deberá priemro buscar a un usuario al que se le desea asignar el ticket despues seleccionar uno de los eventos existentes en la base de datos y una vez seleccionado el evento tambien podrá poner un precio diferente (precio especial para este ticket) y podrá definir si es sompra o cortesia, si es una compra debe seleccionar si es al contado o en cuotas, si es en cuotas podra agregar el numero de cuotas y medio de pago yape plin y debe subir el primer comprobante de pago de la primera cuota y la fecha de descarga en la que estara disponible elticket para su descarga y de esta forma debe asignar el ticket, una vez creado el ticket se mostrará en el perfil del usuario como si hibiera echo una compra y tambien podrá ir pagando sus cuotas adjuntando un comprobante de pago como una compra normal continual el flujo hasta la descarga del ticket.


#### 2.1 Exploración de eventos en la ruta /eventos
- Eventos filtrados por país, fecha y precio: Usuarios logueados y no logueados pueden filtrar.
- Mostrar el precio menor en la tarjeta: Los eventos manejan distintas zonas y precios pero uno de ellos siempre va a ser de menor precio, este menorprecio debe ser mostrado en las tarjetas del evento. 
- Contador regresivo exacto hasta la fecha y hora del evento: en la tarjeta se debe mostrar el contador regresivo.
- Mapa de ubicación integrado con API gratuita dentro de detalles del evvento. 
- Eventos con zonas diferenciadas (General, VIP, Platinum) 
- Información detallada de artistas y lineup

#### ruta /eventos/slug/page
- diseño moderno y facil de entender bien distribuido todos los elementos
- Se debe mostrar todos los detalles del evento como por ejempo:
    - Mapa de ubicación integrado con API gratuita.
    - precios detallados en cards segun la zona Y fases de venta.
    - Contador regresivo exacto hasta la fecha y hora del evento
    - ETC


#### 2.2 Opciones de compra
- Solo los usuarios logueados pueden comprar entradas
- El usuario ingresa a /eventos/slug/page donde verá los precios de las entrdas junto a los detalles del evento.
- El usuario puede ver si el evento vende entradas a través de RaveHub o una ticketera externa
- Si es externo, se muestra el enlace a la ticketera externa
- Para tickets en RaveHub, se muestran los precios según:
  - Zona seleccionada (General, VIP, etc.)
  - Fase de venta actual (Early Bird, Tier 1, etc.)
  - Puede ver si está disponible o agotado.

#### 2.3 Modalidades de pago
- **Pago al contado**: Checkout directo con pago completo
- **Pago en cuotas**:
  - El usuario Selección de número de cuotas que desea pagar.
  - Selección de frecuencia (semanal, quincenal, mensual)
  - Visualización del calendario de pagos con montos y fechas exactas calculados automaticamente segun el numero de cuotas seleccionado por el usuario.

#### 2.4 Métodos de pago
- **Pagos online**: Integración con MercadoPago
- **Pagos offline**:
  - YAPE / PLIN: El usuario ve el número donde debe realizar el pago
  - Transferencia bancaria: Se muestran cuentas bancarias disponibles
  - Subida de comprobante de pago mediante.
  - Estado pendiente hasta aprobación por el administrador

#### 2.5 Nominación de tickets
- Después de la compra y el pago sea completo al 100% del valor del ticket, el usuario o administrar nominar cada ticket adquirido.
- Formulario para ingresar:
  - Nombre y apellido
  - Tipo y número de documento de identidad (validado según país)
- Los tickets estarán disponibles para descarga solo después de la fecha establecida por el administrador

### 3. Sistema de seguimiento de pagos en cuotas
- En su perfil, el usuario puede ver:
  - Calendario de pagos con fechas exactas
  - Estado de cada cuota (pendiente, pagada, vencida)
  - Opción para subir comprobantes de pago para cuotas pendientes
  - Notificaciones automáticas antes del vencimiento de cuotas

### 4. Tienda de merchandising
- Productos categorizados por tipo (ropa, accesorios, banderas, etc.)
- Modalidad de pago offline y online (online deshabiliytado solo moostrar un boton "Pagar en linea" y un mensaje proximamente)
la modalidad offline debe ser mediante yape , plin o transferencia y se debe subir el comprobante de pago para que el administrador pueda aprobar la compra del producto y posteriormete marcar el estado en la que se encunntra el pedido, aprobado , en camino, entrgado. el administrador puede asignar una fecha de entrega para cada pedido y podra editar en que esytado se encuentra despues de aceotar el pedido si ya esta en camino o si ya se entregó
- Filtros por artista, precio  y genero (hombre mujer)
- Precios mostrados en la moneda preferida del usuario (se debe hacer la conversion automatica y el cleinte tambien tinen la posibilidad de cmabiar la divisa para que vea cuanto cuenta en otras divisas)
- Selección de variantes (talla, color, etc segun sea el tipo de producto)
- El administrador podrá incluir o no el precio de envío.
- Integración con sistemas de pago (online y offline)

####   Gestión de tienda y envíos
- el admin puede crear y edición de productos
- Gestión de inventario y variantes
- Configuración de zonas de envío y costos
- Seguimiento de órdenes y actualización de estados

### 5. Gestión administrativa

#### 5.1 Creación y configuración de eventos
- Definición de fechas exactas (inicio y fin)
- Configuración del país y moneda local del evento
- Creación de zonas (General, VIP, etc.) con capacidades
- Definición de fases de venta (Early Bird, Tier 1, etc.) con fechas precisas
- Configuración de métodos de pago aceptados (online, offline, cuotas)
- Establecimiento de la fecha de disponibilidad de tickets para descarga

para crear un evento el administrador debera ingresar todos los datos del evento como:
Nombre del Evento * 
Slug (URL) (con boton para genrear)
Descripción * con soporte a escribir en HTML Y CSS  y previsualizacion.
Versión corta para listados y previews (máximo 160 caracteres) Esta descripción se usará en los resultados de búsqueda y redes sociales. Máximo 160 caracteres.
Fecha de Inicio *
Hora de Inicio *
Esi el vento es de varios días fecha inicio fecha fin
Categorías (separadas por comas)
Ej. Electrónica, Techno, House
Tags (separados por comas)
Ej. festival, verano, música
Imagen Principal
Imagen de Banner
Ubicación
Información sobre dónde se realizará el evento
Nombre del Lugar *
Ej. Estadio Nacional
Dirección *
Ej. Av. Principal 123
Ciudad *
Ej. Lima
País *
Ej. Perú
Latitud
0
Longitud
0


Tickets y Zonas
Configura las zonas y precios de los tickets

habilitar/deshabilitar Vender tickets en RaveHub
si no esta habilitado pedir link de la ticketera externa.
si esta habilitado mostrar:
antes de agregar el precio el admin podrá seleccionar la divisa en la que se mostrar este evento y su respectivo pais.
Zonas del Evento
Añadir Zona
Zona 1

Nombre *
General
Capacidad *
100
Descripción
Describe esta zona...
Fases de Venta (Tiers)
Añadir Fase
Fase 1

Nombre *
Early Bird


Activo
Fecha de Inicio *
mm/dd/yyyy
Hora de Inicio
--:-- --
Fecha de Fin *
mm/dd/yyyy
Hora de Fin
--:-- --
Precios por Zona
General
Precio (USD)
Ej. 100.00
Precio (USD)
Ej. 25.00
Disponibles
Ej. 500

Artistas
Añade los artistas que participarán en el evento
Artistas
Añadir Artista
Artista 1

Nombre *
Ej. DJ Snake
URL de Imagen
https://ejemplo.com/imagen.jpg
Descripción
Biografía del artista...
Instagram
@usuario
Spotify
URL de Spotify
SoundCloud
URL de SoundCloud


Opciones de Pago
Configura las opciones de pago para este evento
Habilitar/deshabilitar pagos offline
Habilitar/deshabilitar pagos en cuotas
Política de Reembolso
Describe la política de reembolso para este evento...
Optimización para Motores de Búsqueda (SEO)
Configura cómo aparecerá tu evento en los resultados de búsqueda y redes sociales
Título SEO
Título optimizado para SEO
0/60 caracteres. Recomendado: 50-60 caracteres.

Descripción SEO
Descripción optimizada para SEO
0/160 caracteres. Recomendado: 150-160 caracteres.

Palabras Clave (separadas por comas)
Ej. festival, música, electrónica
Tipo de Open Graph
Evento

Tipo de Twitter Card
Summary Large Image

Imagen para Redes Sociales (Open Graph)No file chosen
Tamaño recomendado: 1200x630 píxeles. Si no se proporciona, se usará la imagen principal.

Vista previa en Google
Título del evento
Descripción del evento...
Fecha del evento - Ciudad
JSON-LD (Schema.org)
Mostrar
Este código JSON-LD se insertará automáticamente en la página del evento para mejorar su visibilidad en los motores de búsqueda.
Consejos de SEO
Incluye palabras clave relevantes en el título y descripción
Usa un slug descriptivo y fácil de leer
Proporciona información detallada sobre ubicación, fecha y artistas
Incluye imágenes optimizadas con nombres de archivo descriptivos
Completa todos los campos de metadatos para Open Graph y Twitter Cards







 

## Integración de APIs y optimización

### 1. APIs gratuitas a implementar
- **Mapas**: OpenStreetMap para mostrar ubicaciones de eventos
- **Conversión de monedas**: API gratuita para tipos de cambio actualizados
- **Geolocalización**: Detección de país para usuarios no autenticados

### 2. Optimización SEO
- SLUGS URLs amigables en español para mejor indexación
- Metadatos personalizados para cada página (título, descripción, palabras clave)
- Estructura semántica HTML apropiada
- Optimización de imágenes y recursos
- Implementación de datos estructurados (Schema.org)

### 3. Rendimiento
- Carga diferida de imágenes y componentes 
- Optimización de Firebase para reducir lecturas/escrituras
- Uso de Static Site Generation (SSG) donde sea posible
- Implementación de caché para datos frecuentemente utilizados
- Precompilación de estilos CSS con Tailwind

## Consideraciones técnicas adicionales

### Seguridad
- Reglas de Firebase estrictas para proteger datos sensibles
- Validación completa de datos en cliente y servidor
- Protección contra ataques comunes (XSS, CSRF)
- Gestión segura de datos personales
 

## Modelos de datos

### Modelo de Evento
```typescript
// ========================
// USER RELATED MODELS
// ========================

/**
 * User model representing a registered RaveHub user
 * Contains personal information, authentication details, and preferences
 */
export interface User {
  id: string;                   // Firebase Auth UID
  email: string;               
  firstName: string;
  lastName: string;
  phone: string;                // Includes country prefix
  phonePrefix: string;          // Country phone prefix (e.g., +51, +56)
  country: string;              // User's selected country of residence
  documentType: string;         // DNI, Cedula, RUT, etc. depending on country
  documentNumber: string;       // The actual ID number
  createdAt: Date;
  updatedAt: Date;
  avatar?: string;              // URL to user profile image
  preferredCurrency: string;    // Currency code (PEN, CLP, USD, etc.)
  lastLoginAt?: Date;
  isActive: boolean;            // Account status
  role: 'user' | 'admin';       // User role for access control
}

/**
 * Model to store user's notification preferences
 * Linked to User model by userId
 */
export interface UserNotificationSettings {
  userId: string;
  emailNotifications: boolean;  // General email notifications
  smsNotifications: boolean;    // SMS notifications
  paymentReminders: boolean;    // Notifications for upcoming payments
  eventReminders: boolean;      // Reminders about upcoming events
  marketingEmails: boolean;     // Marketing and promotional content
}

/**
 * Model to track user sessions for analytics
 * Helps with understanding platform usage patterns
 */
export interface UserSession {
  id: string;
  userId: string;
  startTime: Date;
  endTime?: Date;
  ipAddress: string;
  deviceInfo: string;
  browser: string;
  geolocation?: {
    country: string;
    city?: string;
    latitude?: number;
    longitude?: number;
  };
}

// ========================
// EVENT RELATED MODELS
// ========================

/**
 * Main Event model that represents an event in the platform
 * Contains all event details, pricing, location, etc.
 */
export interface Event {
  id: string;
  slug: string;                 // URL friendly name for SEO
  name: string;                 // Event name
  description: string;          // Full HTML/CSS supported description
  shortDescription: string;     // Short version for listings (max 160 chars for SEO)
  startDate: Date;              // Event start date and time
  startTime: string;            // Time format HH:MM
  endDate: Date;                // For multi-day events
  categories: string[];         // List of categories (e.g., ["Electrónica", "Techno"])
  tags: string[];               // List of tags (e.g., ["festival", "verano"])
  mainImageUrl: string;         // Main event image
  bannerImageUrl: string;       // Banner for event page header
  location: EventLocation;      // Venue and location details
  country: string;              // Country where event takes place
  currency: string;             // Base currency for ticket prices (PEN, CLP, USD)
  status: 'draft' | 'published' | 'cancelled' | 'completed';
  createdAt: Date;
  updatedAt: Date;
  createdBy: string;            // Admin user ID who created the event
  sellTicketsOnPlatform: boolean; // Whether tickets are sold on RaveHub
  externalTicketUrl?: string;   // URL to external ticketing platform if applicable
  allowOfflinePayments: boolean;
  allowInstallmentPayments: boolean;
  refundPolicy?: string;        // Refund policy text
  artistLineup: Artist[];       // List of artists performing
  isHighlighted: boolean;       // For featuring events on homepage
  ticketsAvailableDate?: Date;  // Date when tickets become available for download
  
  // SEO fields
  seoTitle: string;             // SEO optimized title (50-60 chars)
  seoDescription: string;       // SEO meta description (150-160 chars)
  seoKeywords: string[];        // SEO keywords
  ogType: string;               // Open Graph type (typically "event")
  twitterCardType: string;      // Twitter card type
  socialImageUrl?: string;      // Image for social sharing (1200x630px)
}

/**
 * Location details for events
 * Contains both human-readable address and coordinates
 */
export interface EventLocation {
  venueName: string;            // Name of the venue (e.g., "Estadio Nacional")
  address: string;              // Street address
  city: string;                 // City name
  country: string;              // Country name
  latitude: number;             // For map integration
  longitude: number;            // For map integration
  additionalInfo?: string;      // Any extra location details
}

/**
 * Artist performing at an event
 * Multiple artists can be linked to an event
 */
export interface Artist {
  id: string;
  name: string;                 // Artist name
  imageUrl?: string;            // Artist image
  description?: string;         // Artist bio/description
  instagramHandle?: string;     // Instagram username
  spotifyUrl?: string;          // Spotify profile URL
  soundcloudUrl?: string;       // SoundCloud profile URL
  order?: number;               // For ordering in the lineup
}

/**
 * Zone represents different ticket areas for an event
 * An event can have multiple zones (e.g., General, VIP, Platinum)
 */
export interface Zone {
  id: string;
  eventId: string;              // Reference to the event this zone belongs to
  name: string;                 // Zone name (e.g., "General", "VIP")
  capacity: number;             // Total capacity for this zone
  description?: string;         // Description of the zone and its benefits
  isActive: boolean;            // Whether this zone is currently active
}

/**
 * Sales Phase (Tier) for each zone
 * Represents different pricing periods (Early Bird, Regular, etc.)
 */
export interface SalesPhase {
  id: string;
  eventId: string;              // Reference to the event
  name: string;                 // Phase name (e.g., "Early Bird", "Tier 1")
  isActive: boolean;            // Whether this phase is currently active
  startDate: Date;              // When this sales phase begins
  startTime?: string;           // Optional specific time
  endDate: Date;                // When this sales phase ends
  endTime?: string;             // Optional specific time
  zonesPricing: ZonePricing[];  // Pricing for each zone during this phase
}

/**
 * Pricing for a specific zone during a specific sales phase
 */
export interface ZonePricing {
  zoneId: string;               // Reference to the zone
  phaseId: string;              // Reference to the sales phase
  price: number;                // Price in the event's currency
  available: number;            // Number of tickets available at this price
  sold: number;                 // Number of tickets sold at this price point
}

/**
 * Ticket template that can be assigned to users
 * This is the actual ticket that will be downloaded
 */
export interface TicketTemplate {
  id: string;
  eventId: string;              // Reference to the event
  zoneId: string;               // Reference to the zone
  pdfUrl?: string;              // URL to the PDF ticket template
  isActive: boolean;            // Whether this template is currently active
  createdAt: Date;
  updatedAt: Date;
}

// ========================
// TICKET PURCHASE MODELS
// ========================

/**
 * Represents a ticket transaction (purchase)
 * This is the main record for ticket purchases
 */
export interface TicketTransaction {
  id: string;
  userId: string;               // User who made the purchase
  eventId: string;              // Event the tickets are for
  createdAt: Date;              // Purchase date
  totalAmount: number;          // Total amount in event's currency
  currency: string;             // Currency code
  paymentMethod: 'online' | 'offline'; // Payment method
  paymentStatus: 'pending' | 'approved' | 'rejected' | 'cancelled';
  paymentType: 'full' | 'installment'; // Full payment or installments
  numberOfInstallments?: number; // If installment, number of payments
  installmentFrequency?: 'weekly' | 'biweekly' | 'monthly'; // Payment frequency
  offlinePaymentMethod?: 'yape' | 'plin' | 'transfer'; // If offline, specific method
  paymentProofUrl?: string;     // URL to uploaded payment proof
  adminNotes?: string;          // Notes added by admin during review
  reviewedBy?: string;          // Admin user ID who reviewed the payment
  reviewedAt?: Date;            // When the payment was reviewed
  ticketsDownloadAvailableDate?: Date; // When tickets can be downloaded
  ticketItems: TicketItem[];    // Tickets included in this transaction
}

/**
 * Individual ticket within a transaction
 * A transaction can include multiple tickets
 */
export interface TicketItem {
  id: string;
  transactionId: string;        // Reference to the parent transaction
  eventId: string;              // Event reference
  zoneId: string;               // Zone reference
  phaseId: string;              // Sales phase reference when purchased
  price: number;                // Individual ticket price
  currency: string;             // Currency code
  status: 'pending' | 'approved' | 'cancelled' | 'used';
  isNominated: boolean;         // Whether the ticket has been assigned to a specific person
  nomineeFirstName?: string;    // If nominated, the person's first name
  nomineeLastName?: string;     // If nominated, the person's last name
  nomineeDocType?: string;      // Type of ID document
  nomineeDocNumber?: string;    // ID document number
  ticketPdfUrl?: string;        // URL to the generated ticket PDF
  ticketCode?: string;          // Unique code for ticket validation
  createdAt: Date;
  updatedAt: Date;
}

/**
 * Payment installment for transactions with multiple payments
 * Used for tracking payment schedules
 */
export interface PaymentInstallment {
  id: string;
  transactionId: string;        // Reference to the transaction
  installmentNumber: number;    // Which installment (1, 2, 3, etc.)
  amount: number;               // Amount due for this installment
  currency: string;             // Currency code
  dueDate: Date;                // When payment is due
  status: 'pending' | 'paid' | 'overdue' | 'cancelled';
  paymentDate?: Date;           // When payment was made
  paymentProofUrl?: string;     // URL to uploaded payment proof
  adminApproved: boolean;       // Whether admin approved this payment
  approvedBy?: string;          // Admin who approved the payment
  approvedAt?: Date;            // When the payment was approved
  notes?: string;               // Admin or system notes
}

// ========================
// STORE & MERCHANDISE MODELS
// ========================

/**
 * Product category for organizing store items
 */
export interface ProductCategory {
  id: string;
  name: string;                 // Category name
  slug: string;                 // URL-friendly version of the name
  description?: string;         // Category description
  imageUrl?: string;            // Category image
  isActive: boolean;            // Whether this category is displayed
  order: number;                // For sorting categories
}

/**
 * Product model representing merchandise items for sale
 */
export interface Product {
  id: string;
  name: string;                 // Product name
  slug: string;                 // URL-friendly version of name
  description: string;          // Full product description (HTML supported)
  shortDescription: string;     // Brief description for listings
  categoryId: string;           // Reference to product category
  price: number;                // Base price
  currency: string;             // Base currency (PEN, CLP, USD)
  discountPercentage?: number;  // Optional discount percentage
  stock: number;                // Available quantity
  images: string[];             // Array of product image URLs
  hasVariants: boolean;         // Whether product has size/color variants
  gender?: 'male' | 'female' | 'unisex'; // Target gender if applicable
  artist?: string;              // Related artist if applicable
  weight?: number;              // Weight for shipping calculations
  dimensions?: {                // Dimensions for shipping
    length: number;
    width: number;
    height: number;
  };
  isActive: boolean;            // Whether product is available for purchase
  createdAt: Date;
  updatedAt: Date;
  
  // SEO fields
  seoTitle: string;             // SEO optimized title
  seoDescription: string;       // SEO meta description
  seoKeywords: string[];        // SEO keywords
}

/**
 * Product variants (sizes, colors, etc.)
 */
export interface ProductVariant {
  id: string;
  productId: string;            // Reference to the product
  type: 'size' | 'color' | 'style'; // Type of variant
  name: string;                 // Variant name (e.g., "S", "Red", etc.)
  additionalPrice?: number;     // Additional cost if different from base price
  stock: number;                // Stock for this specific variant
  sku: string;                  // Stock keeping unit code
  isActive: boolean;            // Whether this variant is available
}

/**
 * Order model for product purchases
 */
export interface Order {
  id: string;
  userId: string;               // User who placed the order
  orderDate: Date;              // When order was placed
  totalAmount: number;          // Total order amount
  currency: string;             // Currency code
  status: 'pending' | 'approved' | 'shipping' | 'delivered' | 'cancelled';
  paymentMethod: 'online' | 'offline'; // Payment method
  offlinePaymentMethod?: 'yape' | 'plin' | 'transfer'; // If offline, specific method
  paymentProofUrl?: string;     // URL to uploaded payment proof
  paymentStatus: 'pending' | 'approved' | 'rejected';
  shippingAddress: Address;     // Shipping address
  shippingCost: number;         // Shipping cost
  expectedDeliveryDate?: Date;  // Expected delivery date set by admin
  trackingNumber?: string;      // Shipping tracking number
  notes?: string;               // Customer or admin notes
  reviewedBy?: string;          // Admin who reviewed the order
  reviewedAt?: Date;            // When the order was reviewed
  orderItems: OrderItem[];      // Items in the order
}

/**
 * Individual item in an order
 */
export interface OrderItem {
  id: string;
  orderId: string;              // Reference to the order
  productId: string;            // Reference to the product
  variantId?: string;           // Reference to the product variant if applicable
  quantity: number;             // Quantity ordered
  pricePerUnit: number;         // Price per unit at time of purchase
  currency: string;             // Currency code
  subtotal: number;             // Price * quantity
}

/**
 * Address model for shipping
 */
export interface Address {
  fullName: string;             // Recipient's full name
  addressLine1: string;         // Street address line 1
  addressLine2?: string;        // Street address line 2 (optional)
  city: string;                 // City
  state: string;                // State/province
  postalCode: string;           // Postal/ZIP code
  country: string;              // Country
  phone: string;                // Contact phone
  isDefault: boolean;           // Whether this is the user's default address
}

// ========================
// BLOG MODELS (Added as requested)
// ========================

/**
 * Blog post model optimized for SEO
 */
export interface BlogPost {
  id: string;
  title: string;                // Post title
  slug: string;                 // URL-friendly version of title
  content: string;              // Full post content (HTML/CSS supported)
  excerpt: string;              // Short summary (max 160 chars for SEO)
  author: string;               // Author name or ID reference
  authorId?: string;            // Optional reference to a user if author is a user
  publishDate: Date;            // Publication date
  updatedDate?: Date;           // Last update date
  status: 'draft' | 'published' | 'archived';
  featured: boolean;            // Whether post is featured
  featuredImageUrl: string;     // Main post image
  categories: string[];         // Blog categories
  tags: string[];               // Blog tags for SEO
  readTime: number;             // Estimated reading time in minutes
  
  // SEO fields
  seoTitle: string;             // SEO optimized title (50-60 chars)
  seoDescription: string;       // SEO meta description (150-160 chars)
  seoKeywords: string[];        // SEO keywords
  ogType: string;               // Open Graph type (typically "article")
  twitterCardType: string;      // Twitter card type
  socialImageUrl?: string;      // Image for social sharing (1200x630px)
  
  // Related content
  relatedPosts?: string[];      // IDs of related posts
  relatedEvents?: string[];     // IDs of related events
}

/**
 * Blog category model
 */
export interface BlogCategory {
  id: string;
  name: string;                 // Category name
  slug: string;                 // URL-friendly version of name
  description?: string;         // Category description
  imageUrl?: string;            // Category image
  parentCategoryId?: string;    // For hierarchical categories
  order: number;                // For sorting categories
  
  // SEO fields
  seoTitle: string;             // SEO title for category page
  seoDescription: string;       // SEO description for category page
}

// ========================
// NOTIFICATION AND SYSTEM MODELS
// ========================

/**
 * Notification model for user alerts
 */
export interface Notification {
  id: string;
  userId: string;               // User who receives the notification
  type: 'payment' | 'event' | 'system' | 'order'; // Type of notification
  title: string;                // Notification title
  message: string;              // Notification content
  relatedId?: string;           // ID of related entity (transaction, event, etc.)
  isRead: boolean;              // Whether user has read this notification
  createdAt: Date;              // When notification was created
  expiresAt?: Date;             // When notification expires (optional)
}

/**
 * Currency exchange rates
 * Stored and updated regularly from external API
 */
export interface ExchangeRate {
  baseCurrency: string;         // Base currency code (usually USD)
  targetCurrency: string;       // Target currency code
  rate: number;                 // Exchange rate
  lastUpdated: Date;            // When this rate was last updated
}

/**
 * System settings for platform configuration
 */
export interface SystemSettings {
  id: string;                   // Usually a single document
  platformName: string;         // Name of the platform
  supportEmail: string;         // Support email address
  supportPhone?: string;        // Support phone number
  defaultCurrency: string;      // Default currency for the platform
  availableCurrencies: string[]; // List of supported currencies
  paymentGateways: {
    mercadoPago: {
      enabled: boolean;
      publicKey?: string;
      // Other configuration (stored securely elsewhere)
    },
    // Other payment gateways
  };
  offlinePaymentMethods: {
    yape: {
      enabled: boolean;
      accountNumber?: string;
      accountName?: string;
      instructionsHtml?: string;
    },
    plin: {
      enabled: boolean;
      accountNumber?: string;
      accountName?: string;
      instructionsHtml?: string;
    },
    bankTransfer: {
      enabled: boolean;
      bankAccounts: {
        bankName: string;
        accountNumber: string;
        accountType: string;
        accountName: string;
      }[];
      instructionsHtml?: string;
    }
  };
  seoDefaults: {
    defaultTitle: string;
    defaultDescription: string;
    defaultKeywords: string[];
    siteName: string;
    twitterHandle?: string;
  };
  lastUpdated: Date;            // When settings were last updated
  updatedBy: string;            // Admin who last updated settings
}

/**
 * Audit log for tracking important actions in the system
 */
export interface AuditLog {
  id: string;
  timestamp: Date;              // When the action occurred
  userId: string;               // User who performed the action
  action: string;               // Description of the action
  entityType: string;           // Type of entity affected (user, event, ticket, etc.)
  entityId: string;             // ID of the affected entity
  previousState?: any;          // Previous state of the entity (if applicable)
  newState?: any;               // New state of the entity (if applicable)
  ipAddress: string;            // IP address of the user
  userAgent: string;            // User agent information
}
```

