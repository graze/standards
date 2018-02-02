# AWS

## DNS Names

DNS Records MUST adhere to the following pattern

```text
(instance).aws_service.(az).(region).service.environment.namespace
```

1. `instance` SHALL be used in the case that there are multiple instances of an aws_service, e.g. seperate databases.
1. `aws_service` MUST refer to the specific AWS service that is being used, the correct name of a AWS service MUST be
   as specified as in the [Boto3 Library](https://boto3.readthedocs.io/en/latest/reference/services/index.html).
1. `az` OPTIONALLY can refer to a specific Availability Zone. This may indicate a design problem in the service.
1. `region` OPTIONALLY can refer to a specific region.
1. `service` MUST refer to the specific service.
1. `environment` MUST refer to the environment the service is deployed into (`dev`, `stage`, `test`, `live`).
1. `namespace` MUST be a valid TLD.

Example DNS Records:

```text
exampledb.rds.eu-west-1.example-service.environment.example.com
elasticache.us-west-1.second-service.environment.example.com
```

## Object Names in AWS

1. The name of an Object in AWS must convey the same information at the DNS record, however availability zone and
   region SHOULD NOT be included as this information is conveyed by interaction with the object.
1. The Object name is ordered naturally so that it is read from left to right (inverse of the DNS name).
1. By convention the namespace is assumed to be the standard TLD. Exceptions MAY be made for third party services.
1. Objects MUST be UpperCamelCase and acronyms MUST be Capitalised.

Example Object Names:

```text
EnvironmentExampleServiceRDSExampleDB
EnvironmentSecondServiceElastiCache
ThirdPartyLiveMonitoringEC2
```
