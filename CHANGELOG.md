# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

## [3.1.1] - 2020-12-23
### Changed
* Fix `AbstractEventSourced` method scope (warning in PHP8).

## [3.1.0] - 2020-11-28
### Changed
* Upgrade `jasonbenett/ddd` from version 1 to version 2.

## [3.0.0] - 2020-11-28
### Added
* PHP8 Support.

## [2.1.0] - 2020-11-18
### Added
* Add useful generic projection bus and associated projection interface.

## [2.0.0] - 2020-11-17
### Changed
* Expose the type of the aggregate in the domain event.

## [1.0.3] - 2020-11-16
### Changed
* Add the current event class as event type.

## [1.0.2] - 2020-11-10
### Changed
* Add the aggregate root id as a string instead of an object in the event payload.

## [1.0.1] - 2020-11-10
### Changed
* Add the aggregate root id in the event payload.

## [1.0.0] - 2020-11-10
### Added
* Provide abstract domain class to extend on domain events.
* Provide abstract event sourced class to handle domain events on aggregate roots.