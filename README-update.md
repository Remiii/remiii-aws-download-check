# README-setup

## Video array

Videos are listed in `parameter.yml`. To only allow access to these videos, the number of videos need to be specified in the `routing.yml`.

For example if there are 3 videos, the requirement regex need to be at `[1-3]`.

```
remiii_aws_download_check_video:
    path:     /video/{videoNumber}
    defaults: { _controller: remiiiAWSDownloadCheckBundle:Default:video }
    requirements:
        videoNumber: "[1-3]"
```
