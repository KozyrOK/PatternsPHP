# PatternsPHP

A collection of programming design pattern examples implemented in PHP.

This repository contains practical examples of common **Creational**, **Structural**, and **Behavioral** design patterns. Each pattern is implemented as a standalone PHP file and demonstrates its main idea through a small and focused example.

The purpose of this repository is to provide a simple reference for understanding how different design patterns solve common software design problems and how they can be implemented using PHP and object-oriented programming principles.

---

# 1 Creational Patterns

Creational patterns focus on **how objects are created**. They help make object creation more flexible and reduce direct dependencies between client code and concrete classes.

Instead of creating objects directly with the `new` operator everywhere in the application, creational patterns encapsulate or organize the creation process. This makes applications easier to extend, test, and maintain.

## 1.1 Abstract Factory

The **Abstract Factory** pattern provides an interface for creating families of related or dependent objects without specifying their concrete classes directly.

The main idea is to group the creation of related objects inside a factory. Client code works with abstractions and does not need to know which concrete classes are actually being instantiated.

This pattern is useful when an application must support several related implementations of the same set of objects. For example, different factories may create objects for different environments, platforms, product families, or business scenarios.

In this example, factories create different types of workers, such as developers and designers, for different employment models. The client interacts with the factory instead of directly creating each concrete worker.

**Benefits:**

* Creates related objects consistently.
* Reduces dependencies on concrete classes.
* Makes it easier to switch between different object families.
* Supports the Open/Closed Principle when new families are introduced.

[View implementation](./Creational/Abstract_factory.php)

---

## 1.2 Builder

The **Builder** pattern separates the construction of a complex object from its final representation.

Instead of creating an object with a large constructor containing many parameters, the object is built step by step. A builder defines how each part of the object is created, while another component may control the order of the construction process.

This pattern is particularly useful when an object contains many optional parts or when the same construction process can produce different representations.

In this example, a `Message` is constructed from several sections, including a header, body, footer, and custom content. The builder creates each part separately and combines them into the final object.

**Benefits:**

* Simplifies the creation of complex objects.
* Avoids constructors with many parameters.
* Allows different representations to be created using the same process.
* Makes object construction easier to read and maintain.

[View implementation](./Creational/Builder.php)

---

## 1.3 Factory

The **Factory** pattern centralizes object creation inside a dedicated factory class or method.

Instead of creating objects directly in client code, the client requests an object from the factory. The factory contains the logic responsible for creating and configuring the required object.

This reduces coupling between client code and concrete classes.

In this example, `WorkerFactory::make()` is responsible for creating a `Worker` object. Client code does not need to know how the worker is constructed or initialized.

**Benefits:**

* Centralizes object creation logic.
* Reduces direct dependencies on concrete classes.
* Makes object creation easier to modify.
* Improves code readability when creation requires additional logic.

[View implementation](./Creational/Factory.php)

---

## 1.4 Factory Method

The **Factory Method** pattern defines a method responsible for creating an object while allowing subclasses or specialized implementations to determine which concrete class should be instantiated.

The main goal is to move object creation into a dedicated method and allow different implementations to provide different products.

Unlike a simple factory, the Factory Method pattern typically relies on inheritance or specialized factory implementations.

In this example, separate factories are responsible for creating different worker types, such as developers and designers.

**Benefits:**

* Removes direct dependencies on concrete product classes.
* Makes it easier to introduce new product types.
* Encapsulates object creation logic.
* Allows subclasses or specialized factories to control object creation.

[View implementation](./Creational/Factory_method.php)

---

## 1.5 Pool

The **Pool** pattern manages a collection of reusable objects.

Creating some objects may be expensive because they require significant memory, initialization time, network connections, or access to external resources. Instead of constantly creating and destroying such objects, a pool keeps them available for reuse.

An object can usually be requested from the pool, used by the client, and then returned to the pool when it is no longer needed.

In this example, a worker pool manages free and busy workers. Existing worker objects can be reused instead of creating a new object every time.

**Benefits:**

* Reduces the cost of repeated object creation.
* Allows expensive objects to be reused.
* Provides centralized management of shared resources.
* Can improve performance when object initialization is costly.

[View implementation](./Creational/Pool.php)

---

## 1.6 Prototype

The **Prototype** pattern creates new objects by cloning an existing object instead of constructing a new instance from scratch.

A prototype acts as a template. When a similar object is required, the existing object is copied and the clone can then be modified if necessary.

This pattern is useful when creating an object is expensive or complicated, or when many objects share a similar initial configuration.

In this example, a worker object is used as a prototype. A new worker is created by cloning the existing object.

**Benefits:**

* Reduces the complexity of object creation.
* Avoids repeating initialization logic.
* Allows new objects to be created from existing configurations.
* Can improve performance when construction is expensive.

[View implementation](./Creational/Prototype.php)

---

## 1.7 Singleton

The **Singleton** pattern ensures that a class has only one instance and provides a global access point to that instance.

The class controls its own instantiation by preventing direct construction and returning the same instance whenever it is requested.

Singletons are often used for shared application resources such as configuration managers, logging services, caches, or connection managers.

In this example, the `Connection` class provides a static `getInstance()` method that returns the same object instance.

**Benefits:**

* Guarantees a single instance.
* Provides centralized access to a shared resource.
* Prevents unnecessary duplicate objects.

**Note:** The Singleton pattern should be used carefully because global access can increase coupling and make testing more difficult.

[View implementation](./Creational/Singleton.php)

---

## 1.8 Static Factory

The **Static Factory** pattern provides a static method responsible for creating objects.

Instead of creating an object directly with the `new` operator, client code calls a static factory method. The factory decides which concrete implementation should be returned.

This approach can simplify object creation when several implementations share a common interface or base class.

In this example, the static factory selects and creates the appropriate worker implementation based on the requested worker type.

**Benefits:**

* Encapsulates object creation.
* Provides meaningful factory method names.
* Can return different implementations.
* Reduces direct dependencies on concrete classes.

[View implementation](./Creational/Static_factory.php)

---

# 2 Structural Patterns

Structural patterns focus on **how classes and objects are combined to form larger and more flexible structures**.

They help define relationships between components while reducing unnecessary dependencies. Structural patterns often use composition, delegation, wrapping, or abstraction to make a system easier to extend and maintain.

## 2.1 Adapter

The **Adapter** pattern allows objects with incompatible interfaces to work together.

An adapter acts as a translator between two interfaces. It receives requests using one interface and converts them into calls understood by another object.

This pattern is useful when integrating legacy code, third-party libraries, or external services whose interfaces do not match the interface required by the application.

In this example, an outsourced worker uses a different salary calculation interface. The adapter converts this interface into the one expected for a native worker.

**Benefits:**

* Allows incompatible interfaces to work together.
* Supports integration with legacy or third-party code.
* Avoids modifying existing classes.
* Improves reuse of existing implementations.

[View implementation](./Structural/Adapter.php)

---

## 2.2 Bridge

The **Bridge** pattern separates an abstraction from its implementation so that both can change independently.

Instead of tightly connecting an abstraction to one specific implementation, the abstraction holds a reference to an implementation interface.

This allows multiple abstractions to work with multiple implementations without creating a large number of subclasses.

In this example, services are separated from text formatting implementations. Different services can use different formatters independently.

**Benefits:**

* Separates high-level abstractions from implementation details.
* Reduces the number of subclasses required.
* Allows abstractions and implementations to evolve independently.
* Improves flexibility when several implementations are available.

[View implementation](./Structural/Bridge.php)

---

## 2.3 Composite

The **Composite** pattern organizes objects into tree structures and allows individual objects and groups of objects to be treated in the same way.

Both simple objects and collections implement the same interface. Client code can therefore work with a single object or a group of objects without knowing the difference.

This pattern is commonly used for user interface components, file systems, document structures, menus, and hierarchical data.

In this example, a mail object consists of several renderable parts, such as a header, body, and footer. Individual parts and groups of parts can be processed using the same interface.

**Benefits:**

* Simplifies working with hierarchical structures.
* Allows individual and composite objects to be treated uniformly.
* Supports recursive structures.
* Reduces special-case logic in client code.

[View implementation](./Structural/Composite.php)

---

## 2.4 Data Mapper

The **Data Mapper** pattern separates domain objects from the code responsible for transferring data between the application and a data source.

The domain object contains business data and behavior, while the mapper handles conversion between raw data and domain objects.

This prevents persistence or storage logic from being mixed directly into business objects.

In this example, a mapper converts worker data into a `Worker` domain object.

**Benefits:**

* Separates domain logic from persistence logic.
* Keeps domain objects independent from storage mechanisms.
* Makes data access easier to replace or modify.
* Improves testability of domain objects.

[View implementation](./Structural/Data_mapper.php)

---

## 2.5 Decorator

The **Decorator** pattern dynamically adds new behavior or responsibilities to an object without modifying its original class.

A decorator wraps another object that implements the same interface. The decorator can add behavior before or after delegating the request to the wrapped object.

Multiple decorators can also be combined to add several independent responsibilities.

In this example, a developer object is decorated to add additional salary calculation related to overtime work.

**Benefits:**

* Adds functionality without modifying existing classes.
* Supports composition of multiple behaviors.
* Avoids creating many subclasses for different feature combinations.
* Follows the Open/Closed Principle.

[View implementation](./Structural/Decorator.php)

---

## 2.6 Dependency Injection

**Dependency Injection** is a design pattern and architectural technique in which an object's dependencies are provided from outside rather than being created internally.

A class declares what it needs, while another part of the application provides those dependencies.

Dependencies can be injected through a constructor, setter method, or other mechanisms.

In this example, a `ControllerConfiguration` object is provided to a `Controller` instead of being created inside the controller.

**Benefits:**

* Reduces coupling between classes.
* Makes dependencies explicit.
* Improves unit testing.
* Allows dependencies to be replaced more easily.
* Supports flexible application architecture.

[View implementation](./Structural/Dependency_injection.php)

---

## 2.7 Facade

The **Facade** pattern provides a simplified interface to a complex subsystem.

Instead of requiring client code to understand and communicate with many different classes, the facade provides a single entry point for common operations.

The facade does not necessarily contain all business logic. Its primary purpose is to simplify access to the underlying subsystem.

In this example, `WorkerFacade` provides a single interface for controlling developer and designer work.

**Benefits:**

* Simplifies access to complex subsystems.
* Reduces dependencies between client code and subsystem classes.
* Provides a clear entry point for common operations.
* Makes application code easier to understand.

[View implementation](./Structural/Facade.php)

---

## 2.8 Fluent Interface

A **Fluent Interface** uses method chaining to create a readable and expressive API.

Each method usually returns the current object or another compatible object, allowing several operations to be connected into one statement.

Fluent interfaces are often used in query builders, configuration APIs, builders, and domain-specific languages.

In this example, a query builder allows methods such as `select()`, `from()`, and `where()` to be chained together to construct a SQL query.

**Benefits:**

* Produces readable and expressive code.
* Makes configuration and object construction easier to understand.
* Reduces temporary variables.
* Creates APIs that resemble natural language.

[View implementation](./Structural/Fluent_interface.php)

---

## 2.9 Flyweight

The **Flyweight** pattern reduces memory usage by sharing objects that contain identical or reusable state.

Instead of creating many objects with the same data, a factory manages shared instances and returns an existing object whenever possible.

The pattern distinguishes between intrinsic state, which can be shared, and extrinsic state, which depends on the specific context.

In this example, `MailFactory` stores and reuses mail objects associated with the same identifier instead of creating duplicate objects.

**Benefits:**

* Reduces memory consumption.
* Avoids unnecessary duplicate objects.
* Improves efficiency when many similar objects are required.
* Centralizes management of shared instances.

[View implementation](./Structural/Flyweight.php)

---

## 2.10 Proxy

The **Proxy** pattern provides a substitute object that controls access to another object.

The proxy implements the same interface as the real object and can perform additional operations before or after delegating a request.

A proxy can be used for lazy loading, access control, logging, caching, remote communication, or resource management.

In this example, the proxy caches the calculated worker salary. The calculation is performed once, and subsequent requests can use the cached result.

**Benefits:**

* Controls access to another object.
* Supports lazy initialization.
* Can add caching or logging.
* Allows additional behavior without modifying the original object.

[View implementation](./Structural/Proxy.php)

---

## 2.11 Registry

The **Registry** pattern provides a centralized location for storing and retrieving shared objects or services.

Objects are usually registered using a unique key and can later be retrieved from the registry.

This pattern is often used for application services, configuration objects, or shared resources.

In this example, a static registry stores and retrieves `Service` instances.

**Benefits:**

* Provides centralized access to shared objects.
* Simplifies registration and retrieval of services.
* Can reduce repeated object creation.

**Note:** Like other global access patterns, Registry should be used carefully because hidden dependencies can make applications more difficult to test and maintain.

[View implementation](./Structural/Registry.php)

---

# 3 Behavioral Patterns

Behavioral patterns focus on **communication between objects and the distribution of responsibilities**.

They define how objects collaborate, exchange information, process requests, and change behavior. These patterns help reduce tight coupling and make complex interactions easier to organize.

## 3.1 Chain of Responsibility

The **Chain of Responsibility** pattern passes a request through a sequence of handlers.

Each handler decides whether it can process the request. If it cannot, the request is passed to the next handler in the chain.

The client sends the request without knowing which handler will ultimately process it.

In this example, a development task is passed through junior, middle, and senior workers until an appropriate worker handles the request.

**Benefits:**

* Reduces coupling between the sender and receiver.
* Allows handlers to be added or reordered.
* Supports flexible request processing.
* Avoids large conditional statements.

[View implementation](./Behavioral/Chain.php)

---

## 3.2 Command

The **Command** pattern encapsulates a request as an object.

Instead of calling an operation directly, the request is represented by a command object containing the information required to execute it.

Commands can be stored, queued, logged, executed later, or undone.

In this example, command objects are used to perform operations such as writing a message and changing output state. The implementation also demonstrates an undo operation.

**Benefits:**

* Separates the object that sends a request from the object that performs it.
* Allows operations to be queued or stored.
* Supports undo functionality.
* Makes commands reusable objects.

[View implementation](./Behavioral/Command.php)

---

## 3.3 Interpreter

The **Interpreter** pattern represents grammar rules or expressions as objects.

Each expression implements an interpretation operation that evaluates the expression against a given context.

Complex expressions can be built by combining simpler expressions.

This pattern is useful for simple languages, filtering systems, rules engines, and expression processing.

In this example, variable, AND, and OR expressions are evaluated against a collection of workers.

**Benefits:**

* Represents expressions using object-oriented structures.
* Allows complex expressions to be composed from simpler ones.
* Makes grammar rules explicit in code.
* Supports extension with additional expression types.

[View implementation](./Behavioral/Interpreter.php)

---

## 3.4 Iterator

The **Iterator** pattern provides sequential access to elements in a collection without exposing the internal structure of that collection.

The iterator maintains information about the current position and provides operations for moving through the collection.

Client code does not need to know whether the collection is implemented as an array, tree, database result, or another structure.

In this example, a list of workers can be navigated using methods such as `next()`, `prev()`, and `getByIndex()`.

**Benefits:**

* Hides collection implementation details.
* Provides a standard way to traverse objects.
* Allows multiple traversal strategies.
* Separates traversal logic from collection logic.

[View implementation](./Behavioral/Iterator.php)

---

## 3.5 Mediator

The **Mediator** pattern centralizes communication between objects.

Instead of objects communicating directly with many other objects, they communicate through a mediator. The mediator coordinates the interaction.

This reduces the number of dependencies between individual components.

In this example, a mediator coordinates communication between a worker and an information database component.

**Benefits:**

* Reduces direct dependencies between objects.
* Centralizes complex interaction logic.
* Makes components easier to reuse independently.
* Simplifies communication between multiple objects.

[View implementation](./Behavioral/Mediator.php)

---

## 3.6 Memento

The **Memento** pattern captures an object's state so that it can later be restored.

The object whose state is saved is usually called the originator. The saved state is stored inside a memento object, while another object may manage multiple mementos.

The pattern allows state restoration without exposing the internal implementation details of the original object.

In this example, a task can save its current state into a `Memento` object and later restore that state.

**Benefits:**

* Supports undo and rollback functionality.
* Preserves encapsulation.
* Separates state storage from the original object.
* Allows previous states to be saved and restored.

[View implementation](./Behavioral/Memento.php)

---

## 3.7 Null Object

The **Null Object** pattern replaces `null` values with a special object that implements the same interface but performs no operation.

Instead of checking whether an object exists before calling a method, client code can safely interact with the null object.

The null object represents the absence of meaningful behavior while preserving the expected interface.

In this example, `NullWorker` implements the `Worker` interface but intentionally performs no action when `work()` is called.

**Benefits:**

* Eliminates repeated null checks.
* Simplifies client code.
* Prevents errors caused by calling methods on `null`.
* Provides predictable behavior.

[View implementation](./Behavioral/Object_null.php)

---

## 3.8 Observer

The **Observer** pattern defines a one-to-many dependency between objects.

When the state of one object changes, all registered observers are automatically notified.

The object being observed is usually called the subject, while the objects receiving notifications are observers.

This pattern is commonly used for event systems, user interfaces, messaging systems, and reactive applications.

In this example, PHP's `SplSubject` and `SplObserver` interfaces are used to notify observers when a worker's name changes.

**Benefits:**

* Supports event-driven communication.
* Reduces coupling between the subject and observers.
* Allows observers to be added or removed dynamically.
* Supports one-to-many notifications.

[View implementation](./Behavioral/Observer.php)

---

## 3.9 Specification

The **Specification** pattern encapsulates business rules or validation logic inside reusable specification objects.

A specification determines whether an object satisfies a particular rule.

Specifications can also be combined using logical operations such as AND, OR, and NOT to create more complex rules.

In this example, specifications evaluate a pupil's rate. Individual rules can be combined using `AndSpecification`, `OrSpecification`, and `NotSpecification`.

**Benefits:**

* Separates business rules from domain objects.
* Makes rules reusable.
* Supports composition of complex conditions.
* Improves readability of business logic.

[View implementation](./Behavioral/Specification.php)

---

## 3.10 State

The **State** pattern allows an object to change its behavior when its internal state changes.

Instead of implementing all state-dependent logic using conditional statements, each state is represented by a separate class.

The main object delegates state-specific behavior to the current state object.

In this example, a task moves through several states: `Created`, `Process`, `Test`, and `Done`.

Each state determines how the task moves to the next state and provides its own status.

**Benefits:**

* Eliminates large conditional structures.
* Separates behavior associated with different states.
* Makes state transitions explicit.
* Makes it easier to add new states.

[View implementation](./Behavioral/State.php)

---

## 3.11 Strategy

The **Strategy** pattern defines a family of interchangeable algorithms or behaviors.

Each strategy implements the same interface, allowing the client to select the required behavior without changing its own implementation.

The context object delegates the operation to the currently selected strategy.

In this example, different `Definer` implementations provide different ways to process data. The `Data` object delegates its behavior to the selected strategy.

**Benefits:**

* Allows algorithms to be changed at runtime.
* Eliminates complex conditional statements.
* Separates algorithms from client code.
* Makes new strategies easy to add.

[View implementation](./Behavioral/Strategy.php)

---

## 3.12 Template Method

The **Template Method** pattern defines the overall structure of an algorithm inside a base class.

Some steps of the algorithm are implemented directly in the base class, while other steps are left for subclasses to implement.

This allows subclasses to customize specific parts of the algorithm without changing the overall process.

In this example, the base `Task` class defines the common sequence for printing sections. Developer and designer tasks provide different implementations for the custom section.

**Benefits:**

* Reuses common algorithm structure.
* Allows subclasses to customize specific steps.
* Prevents duplication of shared logic.
* Keeps the overall process consistent.

[View implementation](./Behavioral/Template_method.php)

---

## 3.13 Visitor

The **Visitor** pattern separates operations from the objects on which those operations are performed.

Instead of adding new operations directly to each object class, a visitor object contains the operation logic.

Objects accept a visitor and call the visitor method appropriate for their concrete type.

This makes it possible to add new operations without modifying the existing object structure.

In this example, a visitor processes different worker types, such as developers and designers, using separate visitor methods.

**Benefits:**

* Separates operations from data structures.
* Makes it easier to add new operations.
* Supports type-specific behavior.
* Keeps object classes focused on their primary responsibilities.

[View implementation](./Behavioral/Visitor.php)

---

# Repository Structure

```text
PatternsPHP/
├── Behavioral/
├── Creational/
└── Structural/
```

Each directory contains standalone PHP examples demonstrating a particular design pattern.

## Purpose

This repository is intended as a practical reference for learning and revising object-oriented design patterns in PHP.

The examples are deliberately compact and focus on the main structure and idea behind each pattern. They are intended to help developers understand:

* what problem a pattern solves;
* how its components interact;
* when the pattern can be useful;
* how it can be implemented in PHP;
* and what advantages it provides in application architecture.

The implementations are educational examples and are designed to demonstrate the fundamental concepts of each pattern rather than provide complete production-ready solutions.
